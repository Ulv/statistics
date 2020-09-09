<?php

namespace Ulv\Statistics;

/**
 * @package Ulv\Statistics
 */
class Variation
{
    use ValidationTrait;

    /**
     * @see https://en.wikipedia.org/wiki/Standard_deviation
     */
    function stdDev(array $array): float
    {
        $this->notEmpty($array);

        $len = count($array);
        $mean = array_sum($array) / $len;
        $res = 0;
        foreach ($array as $v) {
            $res += ($v - $mean) ** 2;
        }
        return sqrt($res / $len);
    }
}