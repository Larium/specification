<?php

declare(strict_types = 1);

namespace Domain;

class LessThanSpecification extends ValueBoundSpecification
{
    public function isSatisfiedBy(Candidate $candidate): bool
    {
        return $candidate->get($this->getAttribute()) < $this->getValue();
    }

    public function isSpecialCaseOf(ValueBoundSpecification $specification): bool
    {
        return $this->getValue() < $specification->getValue();
    }
}
