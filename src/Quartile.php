<?php

namespace Ulv\Statistics;

/**
 * @package Ulv\Statistics
 */
class Quartile
{
    use ValidationTrait;

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
            'Q1' => $this->distribution->median($lower),
            'Q2' => $median,
            'Q3' => $this->distribution->median($upper),
        ];
    }
}