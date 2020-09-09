<?php

require_once __DIR__ . '/vendor/autoload.php';

$array = range(4, 91, 3);
\shuffle($array);

$distribution = new \Ulv\Statistics\Distribution();

var_dump($distribution->mean($array)); // 47.5
var_dump($distribution->median($array)); // 47.5
var_dump($distribution->mode($array)); // 4
var_dump($distribution->weightedMean([1, 4, 16, 2, 6, 3], [10, 20, 15, 4, 32, 11])); // 6.1195652173913

$variation = new \Ulv\Statistics\Variation();

var_dump($variation->stdDev($array)); // 25.966324345198
