<?php

namespace App\Services;

use App\Models\Lawyer;
use App\Models\Matter;
use Exception;
use GuzzleHttp\Client;
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
        $lawyers =  collect($matters)->groupBy('lawyer_id')->map(function ($matters, $lawyerId) use ($brief) {
            $lawyer = Lawyer::find($lawyerId);
            $object = [
                ...$lawyer->toArray(),
                'score' => $this->lawyerScoreService->getScore($lawyer, $matters),
                'summary' => $this->llmQueryService->getLawyerSummary($lawyer, $matters, $brief),
                'matters' => $matters
            ];
            return $object;
        });
        return $lawyers->sortBy(function ($lawyer) {
            return $lawyer['score'];
        })->reverse()->values();
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
            })->slice(0, self::MAX_MATCH_COUNT)->values()->all();
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
        $contextEmbeddings = collect($matterEmbeddeingsArray)->pluck($type)
            ->map(function ($embedding) {
                return json_decode($embedding);
            })
            ->toArray();
        $response = $client->post('http://python_local:5000/sematic-search', [
            'json' => ['case_embeddings' => $contextEmbeddings, 'query' => $brief]
        ]);
        $payload = json_decode($response->getBody());

        $result = [];
        foreach ($payload as $item) {
            $index = $item->index;
            $matter = Matter::with('lawyer')->find($matterEmbeddeingsArray[$index]->matter_id);
            $matterArray =  $matter->toArray();
            $matterArray['score'] = $item->score;
            $result[] = $matterArray;
        }

        return $result;
    }
}
