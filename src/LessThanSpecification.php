<?php

declare(strict_types = 1);

namespace Larium\Specification;

class LessThanSpecification extends ValueBoundSpecification
{
    public function isSatisfiedBy(Candidate $candidate): bool
    {
        return $candidate->get($this->getAttribute()) < $this->getValue();
    }

    public function isSpecialCaseOfLessThanOrEqualSpecification(ValueBoundSpecification $specification): bool
    {
        return $this->getAttribute() === $specification->getAttribute()
            && $this->getValue() <= $specification->getValue();
    }

    public function isSpecialCaseOfLessThanSpecification(ValueBoundSpecification $specification): bool
    {
        return $this->isSpecialCaseOfLessThanOrEqualSpecification($specification);
    }
}
