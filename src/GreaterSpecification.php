<?php

declare(strict_types = 1);

namespace Domain;

class GreaterSpecification extends ValueBoundSpecification
{
    public function isSatisfiedBy(Candidate $candidate): bool
    {
        return $candidate->get($this->getAttribute()) > $this->getValue();
    }
}