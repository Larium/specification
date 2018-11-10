<?php

declare(strict_types = 1);

namespace Larium\Specification;

class EqualSpecification extends ValueBoundSpecification
{
    public function isSatisfiedBy(Candidate $candidate): bool
    {
        return $candidate->get($this->getAttribute()) === $this->getValue();
    }
}
