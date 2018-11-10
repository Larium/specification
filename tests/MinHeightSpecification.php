<?php

declare(strict_types = 1);

namespace Larium\Specification;

class MinHeightSpecification extends LeafSpecification
{
    public function isSatisfiedBy(Candidate $candidate): bool
    {
        return $candidate->get('height') > 5;
    }
}
