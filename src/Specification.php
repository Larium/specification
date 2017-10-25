<?php

declare(strict_types = 1);

namespace Domain;

interface Specification
{
    public function isSatisfiedBy(Candidate $candidate): bool;
}
