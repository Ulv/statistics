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
}