<?php

declare(strict_types = 1);

namespace Domain;

abstract class CombineSpecification implements Specification
{
    abstract public function isSatisfiedBy(Candidate $candidate): bool;

    public function and(Specification $other): Specification
    {
        return new AndSpecification($this, $other);
    }

    public function andNot(Specification $other): Specification
    {
        return new AndNotSpecification($this, $other);
    }

    public function or(Specification $other): Specification
    {
        return new OrSpecification($this, $other);
    }

    public function orNot(Specification $other): Specification
    {
        return new OrNotSpecification($this, $other);
    }

    public function not(): Specification
    {
        return new NotSpecification($this);
    }
}
