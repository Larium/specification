<?php

declare(strict_types = 1);

namespace Domain;

use PHPUnit\Framework\TestCase;

class CombineSpecificationTest extends TestCase
{
    public function testAndOperatorForCombineSpecification()
    {
        $minHeightSpec = new MinHeightSpecification();
        $widthSpec = new HardCodedSpecification(function (Candidate $candidate) {
            return intval($candidate->get('width')) >= 6;
        });

        $spec = $minHeightSpec->and($widthSpec);

        $data = array_filter($this->createCollection(), function ($item) use ($spec) {
            return $spec->isSatisfiedBy($item);
        });

        $this->assertEquals(1, count($data));
    }

    public function testOrOperatorForCombineSpecification()
    {
        $minHeightSpec = new MinHeightSpecification();
        $widthSpec = new HardCodedSpecification(function (Candidate $candidate) {
            return intval($candidate->get('width')) >= 6;
        });

        $spec = $minHeightSpec->or($widthSpec);

        $data = array_filter($this->createCollection(), function ($item) use ($spec) {
            return $spec->isSatisfiedBy($item);
        });

        $this->assertEquals(3, count($data));
    }

    public function testOrNotOperatorForCombineSpecification()
    {
        $minHeightSpec = new MinHeightSpecification();
        $widthSpec = new HardCodedSpecification(function (Candidate $candidate) {
            return intval($candidate->get('width')) >= 6;
        });

        $spec = $minHeightSpec->orNot($widthSpec);

        $data = array_filter($this->createCollection(), function ($item) use ($spec) {
            return $spec->isSatisfiedBy($item);
        });

        $this->assertEquals(4, count($data));
    }

    public function testAndNotOperatorForCombineSpecification()
    {
        $minHeightSpec = new MinHeightSpecification();
        $widthSpec = new HardCodedSpecification(function (Candidate $candidate) {
            return intval($candidate->get('width')) >= 6;
        });

        $spec = $minHeightSpec->andNot($widthSpec);

        $data = array_filter($this->createCollection(), function ($item) use ($spec) {
            return $spec->isSatisfiedBy($item);
        });

        $this->assertEquals(2, count($data));
    }

    public function testNotOperatorForCombineSpecification()
    {
        $minHeightSpec = new MinHeightSpecification();

        $spec = $minHeightSpec->not();

        $data = array_filter($this->createCollection(), function ($item) use ($spec) {
            return $spec->isSatisfiedBy($item);
        });

        $this->assertEquals(1, count($data));
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