<?php

declare(strict_types = 1);

namespace Domain;

use PHPUnit\Framework\TestCase;

class SubsumptionTest extends TestCase
{
    public function testSpecialCaseOfGreaterThan()
    {
        $spec1 = new GreaterThanSpecification('width', 3);
        $spec2 = new GreaterThanOrEqualSpecification('width', 5);

        $result = $spec1->isSpecialCaseOf($spec2);
        $this->assertFalse($result);

        $result = $spec2->isSpecialCaseOf($spec1);
        $this->assertTrue($result);
    }

    public function testSpecialCaseOfLessThan()
    {
        $spec1 = new LessThanSpecification('width', 3);
        $spec2 = new LessThanOrEqualSpecification('width', 5);

        $result = $spec1->isSpecialCaseOf($spec2);
        $this->assertTrue($result);

        $result = $spec2->isSpecialCaseOf($spec1);
        $this->assertFalse($result);
    }

    public function testGeneralizationOfGreaterThan()
    {
        $spec1 = new GreaterThanSpecification('width', 3);
        $spec2 = new GreaterThanOrEqualSpecification('width', 5);

        $result = $spec1->isGeneralizationOf($spec2);
        $this->assertTrue($result);

        $result = $spec2->isGeneralizationOf($spec1);
        $this->assertFalse($result);
    }
}
