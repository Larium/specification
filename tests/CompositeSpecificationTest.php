<?php

declare(strict_types = 1);

namespace Larium\Specification;

use PHPUnit\Framework\TestCase;

class CompositeSpecificationTest extends TestCase
{
    public function testCompositeSpecification()
    {
        $heightSpec = new HardCodedSpecification(function (Candidate $candidate) {
            return intval($candidate->get('height')) > 5;
        });
        $widthSpec = new HardCodedSpecification(function (Candidate $candidate) {
            return intval($candidate->get('width')) >= 5;
        });

        $spec = new CompositeSpecification($heightSpec, $widthSpec);

        $data = array_filter($this->createCollection(), function ($item) use ($spec) {
            return $spec->isSatisfiedBy($item);
        });

        $this->assertEquals(2, count($data));
    }

    public function testRemainderUnsatisfiedBy()
    {
        $heightSpec = new GreaterThanSpecification('height', '5');
        $widthSpec = new GreaterThanOrEqualSpecification('width', '5');

        $spec = new CompositeSpecification($heightSpec, $widthSpec);

        $candidate = new Candidate(['height' => 6, 'width' => '4']);

        $unsatisfied = $spec->remainderUnsatisfiedBy($candidate);

        $this->assertNotNull($unsatisfied);
    }

    private function createCollection()
    {
        return [
            new Candidate(['height' => 4, 'width' => '2']),
            new Candidate(['height' => 6, 'width' => '4']),
            new Candidate(['height' => 8, 'width' => '6']),
            new Candidate(['height' => 7, 'width' => '5']),
        ];
    }
}
