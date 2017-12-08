<?php

declare(strict_types = 1);

namespace Domain;

class ActionPermissionSpecification extends ValueBoundSpecification
{
    const VIEW = 'view';
    const LIST = 'list';
    const CREATE = 'create';
    const UPDATE = 'update';
    const DELETE = 'delete';

    const READ = 'read';
    const WRITE = 'write';

    const ALIAS = [
        self::READ => [self::VIEW, self::LIST],
        self::WRITE => [self::CREATE, self::UPDATE],
    ];

    const ATTRIBUTE = 'action';

    public function __construct(array $actions)
    {
        parent::__construct(self::ATTRIBUTE, $actions);
    }

    public function isSatisfiedBy(Candidate $candidate): bool
    {
        $candidateActionValue = $candidate->get($this->getAttribute());
        $permittedActions = $this->expand($this->getValue());

        return in_array($candidateActionValue, $permittedActions);
    }

    private function expand(array $permittedActions)
    {
        $map = [];
        foreach ($permittedActions as $action) {
            if (isset(self::ALIAS[$action])) {
                $expandedActions = $this->expand(self::ALIAS[$action]);
                $map = array_merge($map, $expandedActions);
            }

            $map = array_merge($map, [$action]);
        }

        return $map;
    }
}
