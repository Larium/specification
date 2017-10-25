<?php

declare(strict_types = 1);

namespace Domain;

class HardCodedSpecification implements Specification
{
    private $callable;

    public function __construct(callable $callable)
    {
        $this->callable = $callable;
    }

    public function isSatisfiedBy(Candidate $candidate): bool
    {
        $callable = $this->callable;

        return $callable($candidate);
    }
}
