<?php

namespace Ulv\Statistics;

/**
 * Class Validation
 * @package Ulv\Statistics
 */
trait ValidationTrait
{
    /**
     * @param array $array
     * @throw \InvalidArgumentException
     */
    protected function notEmpty(array $array): void
    {
        if (empty($array)) {
            throw new \InvalidArgumentException("Source array must not be empty!");
        }
    }

    /**
     * @param array $array1
     * @param array $array2
     * @throw \InvalidArgumentException
     */
    protected function sizeEquals(array $array1, array $array2)
    {
        if (count($array1) !== count($array2)) {
            throw new \InvalidArgumentException("Both arrays must haave equal number of elements!");
        }
    }
}