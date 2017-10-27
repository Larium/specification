<?php

declare(strict_types = 1);

namespace Domain;

class LessThanOrEqualSpecification extends ValueBoundSpecification
{
    public function isSatisfiedBy(Candidate $candidate): bool
    {
        return $candidate->get($this->getAttribute()) <= $this->getValue();
    }

    public function isGeneralizationOfValueBoundSpecification(ValueBoundSpecification $specification): bool
    {
        return $specification->isSpecialCaseOfLessThanOrEqualSpecification($this);
    }
}
