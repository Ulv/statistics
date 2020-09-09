<?php

namespace Ulv\Statistics;

/**
 * @package Ulv\Statistics
 */
class Quartile
{
    use ValidationTrait;

    const Q1 = 'Q1';
    const Q2 = 'Q2';
    const Q3 = 'Q3';

    /**
     * @var DistributionInterface
     */
    private $distribution;

    public function __construct(DistributionInterface $distribution = null)
    {
        $this->distribution = $distribution ?? new Distribution();
    }

    /**
     * @param array $data
     * @return array
     * @throw \InvalidArgumentException
     */
    public function calc(array $data): array
    {
        $this->notEmpty($data);
        $median = $this->distribution->median($data);
        $lower = [];
        $upper = [];

        foreach ($data as $one) {
            if ($one < $median) {
                $lower[] = $one;
            } elseif ($one > $median) {
                $upper[] = $one;
            }
        }

        return [
            self::Q1 => $this->distribution->median($lower),
            self::Q2 => $median,
            self::Q3 => $this->distribution->median($upper),
        ];
    }

    public function interquartileRange(array $data): float
    {
        $data = $this->calc($data);
        return $data[self::Q3] - $data[self::Q1];
    }
}