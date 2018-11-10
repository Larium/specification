<?php

declare(strict_types = 1);

namespace Larium\Specification;

class GreaterThanSpecification extends ValueBoundSpecification
{
    public function isSatisfiedBy(Candidate $candidate): bool
    {
        return $candidate->get($this->getAttribute()) > $this->getValue();
    }

    public function isSpecialCaseOfGreaterThanOrEqualSpecification(ValueBoundSpecification $specification): bool
    {
        return $this->getAttribute() === $specification->getAttribute()
            && $this->getValue() >= $specification->getValue();
    }

    public function isSpecialCaseOfGreaterThanSpecification(ValueBoundSpecification $specification): bool
    {
        return $this->isSpecialCaseOfGreaterThanOrEqualSpecification($specification);
    }

    public function isGeneralizationOfGreaterThanOrEqualSpecification(ValueBoundSpecification $specification): bool
    {
        return $this->getAttribute() === $specification->getAttribute()
            && $this->getValue() <= $specification->getValue();
    }

    public function isGeneralizationOfGreaterThanSpecification(ValueBoundSpecification $specification): bool
    {
        return $this->getAttribute() === $specification->getAttribute()
            && $this->getValue() < $specification->getValue();
    }
}
