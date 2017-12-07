<?php

declare(strict_types = 1);

namespace Domain;

use PHPUnit\Framework\TestCase;

class PermissionSpecificationTest extends TestCase
{
    public function testShouldHandleACLPermissions()
    {
        # User permission element.
        $resource = 'payments';
        $actions = ['read', 'list'];

        # Spec created from User permissions.
        $spec = new CompositeSpecification(
            new EqualSpecification('resource', $resource),
            new ContainsSpecification('action', $actions)
        );

        $candidate = new Candidate([
            'resource' => 'payments',
            'action' => 'read',
        ]);

        $this->assertTrue($spec->isSatisfiedBy($candidate));
    }
}
