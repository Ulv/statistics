<?php

namespace Ulv\Statistics;

/**
 * @package Ulv\Statistics
 */
class Distribution implements DistributionInterface
{
    use ValidationTrait;

    public function mean(array $array): float
    {
        $this->notEmpty($array);

        return array_sum($array) / count($array);
    }

    public function median(array $array): float
    {
        $this->notEmpty($array);

        sort($array);
        $len = count($array);
        return ($array[$len / 2] + $array[($len - 1) / 2]) / 2;
    }

    public function mode(array $array): float
    {
        $this->notEmpty($array);

        $array = array_count_values($array);
        $maxs = array_keys($array, max($array));
        sort($maxs);
        return array_shift($maxs);
    }

    public function weightedMean(array $array, array $weights): float
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