<?php

namespace App\Console\Commands;

use App\Models\Lawyer;
use App\Models\Matter;
use App\Services\LlmQueryService;
use Illuminate\Console\Command;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class GenerateMatterEmbeddings extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-vectors';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates vectors for lawyers and matters';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $client = new Client();
        DB::table('matter_embeddings')->delete();

        $llmQueryService = App::make(LlmQueryService::class);
        // Make a POST request to the Python API
        Matter::chunk(30, function ($matters) use ($client,$llmQueryService) {
            foreach ($matters as $matter) {
                try {
                    $attributes = $matter->getContextAttributes();
                    // $response = $client->post('http://python_app:5000/generate-vector', [
                    //     'json' => ['payload' => json_encode($attributes)]
                    // ]);
                    // $contextEmbeddings = trim(json_encode(json_decode($response->getBody())));
                    $contextEmbeddings = $llmQueryService->generateEmbeddings(json_encode($attributes));
                    $attributes = [
                        'lawyer_budget'=>$matter->budget
                    ];
                    $lawyer = Lawyer::find($matter->lawyer_id);
                    $lawyerAttributes = $lawyer->getAttributes();
                    foreach ($lawyerAttributes as $key => $value) {
                        $key = $key === 'location' ? 'living_in' : $key;
                        $attributes['lawyer_' . $key] = $value;
                    }
                    // $response = $client->post('http://python_app:5000/generate-vector', [
                    //     'json' => ['payload' => json_encode($attributes)]
                    // ]);
                    // $lawyerEmbeddings = trim(json_encode(json_decode($response->getBody())));
                    $lawyerEmbeddings = $llmQueryService->generateEmbeddings(json_encode($attributes));

                    DB::table('matter_embeddings')->insert([
                        'matter_id' => $matter->id,
                        'context_embedding' => json_encode($contextEmbeddings),
                        'lawyer_embedding'=> json_encode($lawyerEmbeddings)
                    ]);
                } catch (\Exception $e) {
                    // Handle exceptions
                    dd($e->getMessage());
                }
            }
        });
    }
}
