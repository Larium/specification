<?php

declare(strict_types = 1);

namespace Larium\Specification;

class ContainsSpecification extends ValueBoundSpecification
{
    public function isSatisfiedBy(Candidate $candidate): bool
    {
        return in_array($candidate->get($this->getAttribute()), $this->getValue());
    }
}
