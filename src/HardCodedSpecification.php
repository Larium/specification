<?php

declare(strict_types = 1);

namespace Domain;

/**
 * HardCodedSpecification class.
 *
 * Implemented by coding the selection criteria into the isSatisfiedBy method
 * as a block of code.
 *
 * @link https://martinfowler.com/apsupp/spec.pdf Specifications page 8.
 * @author Andreas Kollaros <andreas@larium.net>
 */
final class HardCodedSpecification extends LeafSpecification
{
    private $callable;

    public function __construct(callable $callable)
    {
        $this->callable = $callable;
    }

    public function isSatisfiedBy(Candidate $candidate): bool
    {
        $callable = $this->callable;

        return $callable($candidate);
    }
}
