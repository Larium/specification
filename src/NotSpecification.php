<?php

declare(strict_types = 1);

namespace Domain;

class NotSpecification extends CombineSpecification
{
    private $wrapped;

    public function __construct(Specification $x)
    {
        $this->wrapped = $x;
    }

    public function isSatisfiedBy(Candidate $candidate): bool
    {
        return !$this->wrapped->isSatisfiedBy($candidate);
    }
}
