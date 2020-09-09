<?php

namespace Ulv\Statistics;

/**
 * @package Ulv\Statistics
 */
class Distribution
{
    use ValidationTrait;

    /**
     * @see https://en.wikipedia.org/wiki/Arithmetic_mean
     */
    function mean(array $array): float
    {
        $this->notEmpty($array);

        return array_sum($array) / count($array);
    }

    /**
     * @see https://en.wikipedia.org/wiki/Median
     */
    function median(array $array): float
    {
        $this->notEmpty($array);

        sort($array);
        $len = count($array);
        return ($array[$len / 2] + $array[($len - 1) / 2]) / 2;
    }

    /**
     * @see https://en.wikipedia.org/wiki/Mode_(statistics)
     */
    function mode(array $array): float
    {
        $this->notEmpty($array);

        $array = array_count_values($array);
        $maxs = array_keys($array, max($array));
        sort($maxs);
        return array_shift($maxs);
    }

    /**
     * @see https://en.wikipedia.org/wiki/Weighted_arithmetic_mean
     */
    function weightedMean(array $array, array $weights): float
    {
        $this->notEmpty($array);
        $this->notEmpty($weights);
        $this->sizeEquals($array, $weights);

        $num = 0;
        foreach ($array as $i => $v) {
            $num += $v * $weights[$i];
        }
        return $num / array_sum($weights);
    }
}