<?php

declare(strict_types = 1);

namespace Domain;

class LessThanOrEqualSpecification extends ValueBoundSpecification
{
    public function isSatisfiedBy(Candidate $candidate): bool
    {
        return $candidate->get($this->getAttribute()) <= $this->getValue();
    }

    public function isSpecialCaseOfLessThanOrEqualSpecification(ValueBoundSpecification $specification): bool
    {
        return $this->getAttribute() === $specification->getAttribute()
            && $this->getValue() <= $specification->getValue();
    }

    public function isSpecialCaseOfLessThanSpecification(ValueBoundSpecification $specification): bool
    {
        return $this->getAttribute() === $specification->getAttribute()
            && $this->getValue() < $specification->getValue();
    }

    public function isGeneralizationOfLessThanOrEqualSpecification(ValueBoundSpecification $specification): bool
    {
        return $this->getAttribute() === $specification->getAttribute()
            && $this->getValue() >= $specification->getValue();
    }

    public function isGeneralizationOfLessThanSpecification(ValueBoundSpecification $specification): bool
    {
        return $this->isGeneralizationOfLessThanOrEqualSpecification($specification);
    }
}
