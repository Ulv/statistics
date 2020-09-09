<?php

namespace Ulv\Statistics;

/**
 * @package Ulv\Statistics
 */
interface DistributionInterface
{
    public function mean(array $array): float;

    public function median(array $array): float;

    public function mode(array $array): float;

    public function weightedMean(array $array, array $weights): float;
}