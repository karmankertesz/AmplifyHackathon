<?php

namespace App\Services;

use Exception;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class LlmQueryService
{

    private $client;

    public function __construct()
    {
       
        $this->client = new Client([
            'base_uri'=>'https://eastus2.api.cognitive.microsoft.com/openai/deployments/overseas-gpt-4o/',
            'headers'=>[
                'Authorization'=>'Bearer '.env('OPENAI_API_KEY'),
                'Content-Type'=>'application/json',
                'api-key'=> env('OPENAI_API_KEY')
            ]
        ]);
    }

    public function processQuery($brief)
    {
        $payload = [
            'model' => 'gpt-4o',
            'messages' => [
                ["role" => "system", "content" => "You are a text parser that detects location and budget from a text and returns a json object"],
                ["role" => "system", "content" => "Just give me the json object nothing else"],
                ["role" => "system", "content" => "remove the word json , just keep the object to i can json_decode the string"],
                [
                    "role" => "user",
                    "content" => $brief
                ]
            ],
            'temperature' => 0.7,
            'top_p' => 0.95,
            'max_tokens' => 800,
            'stream' => false

        ];
        $response = $this->client->post('chat/completions?api-version=2024-02-15-preview', [
            'json' => $payload,
        ]);
        $response = json_decode($response->getBody());
        return json_decode($response->choices[0]->message->content);
    }

    public function generateEmbeddings($attributeString)
    {
        $payload = [
            'model' => 'text-embedding-3-large',
            'input'=>$attributeString
        ];
        try{
            $response = $this->client->post('embeddings?api-version=2024-02-15-preview', [
                'json' => $payload,
            ]);
            $response = json_decode($response->getBody());
            return $response;
        }catch(Exception $ex){
            Log::error($ex->getMessage());
        }
       
    }

    public function getLawyerSummary($lawyer, $matters,$brief) {
        $matterDescriptions = "Case : ";
        foreach($matters as $matter){
            $matterDescriptions.=$matter['description'];
            $matterDescriptions.=' Case:';
        }
        $payload = [
            'model' => 'gpt-4o',
            'messages' => [
                ["role" => "system", "content" => "You are a matcher, that matches legal cases to the lawyers"],
                ["role" => "user", "content" => "This is my lawyer : ".json_encode($lawyer->getAttributes())],
                ["role" => "user", "content" => "Following are the cases they worked on : ".$matterDescriptions],
                ["role" => "user", "content" => "Include more points from here :".$brief. " as to why they meet the breif"],
                ["role" => "user", "content" => "Do not genderize the summary"],
                [
                    "role" => "user",
                    "content" => "Generate  4 line summary why they are a good fit, just give me the summary nothing else."
                ]
            ],
            'temperature' => 0.7,
            'top_p' => 0.95,
            'max_tokens' => 1000,
            'stream' => false

        ];
        $response = $this->client->post('chat/completions?api-version=2024-02-15-preview', [
            'json' => $payload,
        ]);
        $response = json_decode($response->getBody());
        return $response->choices[0]->message->content;
    }
}
