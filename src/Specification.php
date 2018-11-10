<?php

declare(strict_types = 1);

namespace Larium\Specification;

interface Specification
{
    public function isSatisfiedBy(Candidate $candidate): bool;

    public function and(Specification $other): Specification;

    public function or(Specification $other): Specification;
}
