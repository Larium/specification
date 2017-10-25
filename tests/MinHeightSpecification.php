<?php

declare(strict_types = 1);

namespace Domain;

class MinHeightSpecification extends CombineSpecification
{
    public function isSatisfiedBy(Candidate $candidate): bool
    {
        return $candidate->get('height') > 5;
    }
}
