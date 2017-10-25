<?php

declare(strict_types = 1);

namespace Domain;

use PHPUnit\Framework\TestCase;

class SpecificationTest extends TestCase
{
    public function testHardCodedSpecification()
    {
        $candidate = new Candidate(['source' => 'transaction']);

        $spec = new HardCodedSpecification(function (Candidate $candidate) {
            return $candidate->get('source') === 'transaction';
        });

        $this->assertTrue($spec->isSatisfiedBy($candidate));
    }

    public function testAndSpecification()
    {
        $collection = $this->createCollectionForComposite();
        $heightSpec = new HardCodedSpecification(function (Candidate $candidate) {
            return intval($candidate->get('height')) > 5;
        });
        $widthSpec = new HardCodedSpecification(function (Candidate $candidate) {
            return intval($candidate->get('width')) >= 5;
        });

        $spec = new AndSpecification($heightSpec, $widthSpec);

        $data = array_filter($collection, function ($item) use ($spec) {
            return $spec->isSatisfiedBy($item);
        });

        $this->assertEquals(2, count($data));
    }

    public function testOrSpecification()
    {
        $collection = $this->createCollectionForComposite();
        $heightSpec = new HardCodedSpecification(function (Candidate $candidate) {
            return intval($candidate->get('height')) > 5;
        });
        $widthSpec = new HardCodedSpecification(function (Candidate $candidate) {
            return intval($candidate->get('width')) >= 5;
        });

        $spec = new OrSpecification($heightSpec, $widthSpec);

        $data = array_filter($collection, function ($item) use ($spec) {
            return $spec->isSatisfiedBy($item);
        });

        $this->assertEquals(3, count($data));
    }

    private function createCollectionForComposite()
    {
        return [
            new Candidate(['height' => 4, 'width' => '2']),
            new Candidate(['height' => 6, 'width' => '4']),
            new Candidate(['height' => 8, 'width' => '6']),
            new Candidate(['height' => 7, 'width' => '5']),
        ];
    }
}
