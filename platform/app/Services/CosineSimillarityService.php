<?php

namespace App\Services;

use Exception;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class CosineSimillarityService{

    private $source;
    private $dataset;

    public function __construct($source, $dataset)
    {
        $this->source = $source;
        $this->dataset = $dataset;
    }

    public  function run()
    {
        $result = [];
        foreach ($this->dataset as $key => $value) {
            $result[$key] = $this->calculate($this->source, $value);
        }
        return $result;
    }

    /**
     * Calculate the cosine similarity between two vectors.
     *
     * @param  array  $vectorA
     * @param  array  $vectorB
     * @return float
     */
    private function calculate(array $vectorA, array $vectorB): float
    {
        $dotProduct = $this->dotProduct($vectorA, $vectorB);
        $magnitudeA = $this->magnitude($vectorA);
        $magnitudeB = $this->magnitude($vectorB);

        if ($magnitudeA == 0 || $magnitudeB == 0) {
            return 0.0;
        }

        return $dotProduct / ($magnitudeA * $magnitudeB);
    }

    /**
     * Calculate the dot product of two vectors.
     *
     * @param  array  $vectorA
     * @param  array  $vectorB
     * @return float
     */
    protected function dotProduct(array $vectorA, array $vectorB): float
    {
        $product = 0;
        foreach ($vectorA as $key => $value) {
            $product += $value * $vectorB[$key];
        }
        return $product;
    }

    /**
     * Calculate the magnitude of a vector.
     *
     * @param  array  $vector
     * @return float
     */
    protected function magnitude(array $vector): float
    {
        $sumOfSquares = 0;
        foreach ($vector as $value) {
            $sumOfSquares += $value * $value;
        }
        return sqrt($sumOfSquares);
    }
}
