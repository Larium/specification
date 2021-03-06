<?php

declare(strict_types = 1);

namespace Larium\Specification;

class AndNotSpecification extends LeafSpecification
{
    private $left;

    private $right;

    public function __construct(Specification $left, Specification $right)
    {
        $this->left = $left;
        $this->right = $right;
    }

    public function isSatisfiedBy(Candidate $candidate): bool
    {
        return $this->left->isSatisfiedBy($candidate)
            && $this->right->isSatisfiedBy($candidate) !== true;
    }
}
