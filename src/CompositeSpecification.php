<?php

declare(strict_types = 1);

namespace Domain;

class CompositeSpecification extends CombineSpecification
{
    private $specifications = [];

    public function __construct(Specification ...$specifications)
    {
        $this->specifications = $specifications;
    }

    public function isSatisfiedBy(Candidate $candidate): bool
    {
        foreach ($this->specifications as $specification) {
            if ($specification->isSatisfiedBy($candidate) === false) {
                return false;
            }
        }

        return true;
    }

    public function remainderUnsatisfiedBy(Candidate $candidate): ?Specification
    {
        if ($this->isSatisfiedBy($candidate)) {
            return null;
        }

        $unsatisfied = [];
        foreach ($this->specifications as $specification) {
            if (!$specification->isSatisfiedBy($candidate)) {
                $unsatisfied[] = $specification;
            }
        }

        return new static(...$unsatisfied);
    }
}
