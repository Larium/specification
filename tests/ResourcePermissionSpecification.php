<?php

declare(strict_types = 1);

namespace Larium\Specification;

class ResourcePermissionSpecification extends ValueBoundSpecification
{
    const ALL = '*';

    const ATTRIBUTE = 'resource';

    public function __construct(string $resourceValue)
    {
        parent::__construct(self::ATTRIBUTE, $resourceValue);
    }

    public function isSatisfiedBy(Candidate $candidate): bool
    {
        return $this->getValue() === self::ALL
            || $candidate->get($this->getAttribute()) === $this->getValue();
    }
}
