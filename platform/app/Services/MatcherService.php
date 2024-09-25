<?php

namespace App\Services;

use App\Models\Lawyer;
use App\Models\Matter;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class MatcherService
{
    const MAX_MATCH_COUNT = 5;
    private $llmQueryService;
    private $lawyerScoreService;

    public function __construct(LlmQueryService $llmQueryService, LawyerScoreService $lawyerScoreService)
    {
        $this->llmQueryService = $llmQueryService;
        $this->lawyerScoreService = $lawyerScoreService;
    }


    public function getMatchingMattersGroupedByLawyer($brief)
    {
        $matters = $this->getMatchingMatters($brief);
        $lawyers =  collect($matters)->groupBy('lawyer_id')->map(function ($mattersForLawyer, $lawyerId) use ($brief) {
            $lawyer = Lawyer::find($lawyerId);
            $mattersForLawyer = $mattersForLawyer->sortByDesc('score')->slice(0,self::MAX_MATCH_COUNT)->values();
            $object = [
                ...$lawyer->toArray(),
                'score' =>  $this->lawyerScoreService->getScore($lawyer, $mattersForLawyer),
                'summary' => $this->llmQueryService->getLawyerSummary($lawyer, $mattersForLawyer, $brief),
                'matters' => $mattersForLawyer
            ];
            return $object;
        });

        return $lawyers->sortBy(function ($lawyer) {
            return $lawyer['score'];
        })->reverse()->slice(0, self::MAX_MATCH_COUNT)->values();
    }

    private function getMatchingMatters($brief)
    {
        $builder = $this->processQuery($brief, true);
        $matterIds = $builder->pluck('id')->toArray();
        $matterEmbeddeingsArray = DB::table('matter_embeddings')->whereIn('matter_id', $matterIds)->get()->toArray();

        if (count($matterEmbeddeingsArray) == 0) {
            return [];
        }

        try {
            $contextMatches = $this->getEmbeddingsFromMatter($matterEmbeddeingsArray, $brief, $matterIds, 'context_embedding');
            $lawyertMatches = $this->getEmbeddingsFromMatter($matterEmbeddeingsArray, $brief, $matterIds, 'lawyer_embedding');
            $result = array_merge($contextMatches, $lawyertMatches);
            $collection = collect($result);
            return $collection->unique(function ($item) {
                return serialize($item);
            })->filter(function ($item){
                return $item['score'] > 0.35;
            })->sortBy(function ($item){
                return $item['score'];
            })->reverse()->values()->all();
        } catch (Exception $ex) {
            dd($ex->getMessage());
        }
    }

    private function processQuery($brief, $useLlm = false)
    {
        $builder = Matter::all();
        if (!$useLlm) {
            return $builder;
        }
        $parameters = $this->llmQueryService->processQuery($brief);
        Log::debug('Searching matter ' . json_encode($parameters));
        $builder = Matter::whereHas('lawyer', function ($q) use ($parameters) {
            if (isset($parameters->location) && $parameters->location != null) {
                return $q->where('location', 'LIKE', '%' . $parameters->location . '%');
            }
            return $q;
        });
        if (isset($parameters->budget) && $parameters->budget != null) {
            $builder->where('budget', '<=', $parameters->budget);
        }

        return $builder;
    }


    private function getEmbeddingsFromMatter($matterEmbeddeingsArray, $brief, $matterIds, $type = 'context_embedding')
    {
        $client = new Client();
        $contextEmbeddings = collect($matterEmbeddeingsArray)->pluck($type,'matter_id')
            ->map(function ($embedding) {
                return json_decode($embedding);
            })
            ->toArray();
        $llmQueryService = App::make(LlmQueryService::class);
        $briefEmbeddings = $llmQueryService->generateEmbeddings($brief);
        $consineSimilaritySerivce = App::make(CosineSimillarityService::class, ['source' => $briefEmbeddings, 'dataset' => $contextEmbeddings]);
        /**
         * @var CosineSimillarityService $consineSimilaritySerivce
         */
        $similarityMatrix = $consineSimilaritySerivce->run();
        $result = [];
        foreach ($similarityMatrix as $matterId => $score) {
            $matter = Matter::with('lawyer')->find($matterId);
            $matterArray =  $matter->toArray();
            $matterArray['score'] = $score;
            $result[] = $matterArray;
        }

        return $result;
    }
}
