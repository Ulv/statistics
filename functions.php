<?php

namespace Ulv\Statistics;

function mean(array $array): float
{
    if (!$array) {
        return 0;
    }
    return array_sum($array) / count($array);
}

function median(array $array): float
{
    if (!$array) {
        return 0;
    }
    sort($array);
    $len = count($array);
    return ($array[$len / 2] + $array[($len - 1) / 2]) / 2;
}

function mode(array $array): float
{
    if (!$array) {
        return 0;
    }
    $array = array_count_values($array);
    $maxs = array_keys($array, max($array));
    sort($maxs);
    return array_shift($maxs);
}

function weightedMean(array $array, array $weights): float
{
    if (!$array || !$weights) {
        return 0;
    }
    $num = 0;
    foreach ($array as $i => $v) {
        $num += $v * $weights[$i];
    }
    return $num / array_sum($weights);
}

function stdDev($array)
{
    if (!$array) {
        return 0;
    }
    $len = count($array);
    $mean = array_sum($array) / $len;
    $res = 0;
    foreach ($array as $v) {
        $res += ($v - $mean) ** 2;
    }
    return sqrt($res / $len);
}
