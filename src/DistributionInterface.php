<?php

namespace Ulv\Statistics;

/**
 * @package Ulv\Statistics
 */
interface DistributionInterface
{
    /**
     * @see https://en.wikipedia.org/wiki/Arithmetic_mean
     */
    public function mean(array $array): float;

    /**
     * @see https://en.wikipedia.org/wiki/Median
     */
    public function median(array $array): float;

    /**
     * @see https://en.wikipedia.org/wiki/Mode_(statistics)
     */
    public function mode(array $array): float;

    /**
     * @see https://en.wikipedia.org/wiki/Weighted_arithmetic_mean
     */
    public function weightedMean(array $array, array $weights): float;
}