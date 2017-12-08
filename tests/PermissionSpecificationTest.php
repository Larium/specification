<?php

declare(strict_types = 1);

namespace Domain;

use PHPUnit\Framework\TestCase;

class PermissionSpecificationTest extends TestCase
{
    public function testShouldHandleACLPermissions()
    {
        $permissions = [
            [
                'resource' => 'payments',
                'actions' => ['read', 'write']
            ],
            [
                'resource' => 'merchants',
                'actions' => ['read']
            ]
        ];

        $spec = array_reduce($permissions, function ($carry, $item) {
            $spec = new CompositeSpecification(
                new ResourcePermissionSpecification($item['resource']),
                new ActionPermissionSpecification($item['actions'])
            );

            return $carry = $carry ? $carry->or($spec) : $spec;
        });

        $candidate = new Candidate([
            'resource' => 'payments',
            'action' => 'read',
        ]);

        $this->assertTrue($spec->isSatisfiedBy($candidate));
    }
}
