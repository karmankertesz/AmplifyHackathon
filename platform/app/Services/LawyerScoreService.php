<?php

namespace App\Services;

use App\Models\Lawyer;
use App\Models\Matter;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;
use LLPhant\Chat\OllamaChat;
use LLPhant\OllamaConfig;

class LawyerScoreService
{
    const WINNING_RATE_WEIGHT = 1.0;
    const SEMANTIC_SCORE_WEIGHT = 3.0;


    public function getScore($lawyer, $matters)
    {
        $totalMatterScore = collect($matters)->sum(function ($matter) {
            return $matter['score'];
        });
        $averageMatterScore = $totalMatterScore / count($matters);

        $averageInFavour = 0;
        foreach ($matters as $matter) {
            if ($matter['in_favour'] === 1) {
                $averageInFavour += 1;
            } else {
                $averageInFavour -= 1;
            }
        }
        $weightedWinningRate = self::WINNING_RATE_WEIGHT * $lawyer->winning_rate;
        $weightedSemanticScore = self::SEMANTIC_SCORE_WEIGHT * $averageMatterScore;
        $rawScore = $weightedSemanticScore + $weightedWinningRate + $averageInFavour;

        $maxPossibleScore = 10;
        $minPossibleScore = 1; 

        $normalizedScore = 1 + (($rawScore - $minPossibleScore) * (9 / ($maxPossibleScore - $minPossibleScore)));
        $finalScore = round(max(1, min(10, $normalizedScore)));
        return $finalScore;
    }
}
