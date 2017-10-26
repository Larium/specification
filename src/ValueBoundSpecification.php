<?php

declare(strict_types = 1);

namespace Domain;

abstract class ValueBoundSpecification extends CombineSpecification
{
    private $attribute;

    private $value;

    public function __construct(string $attribute, $value)
    {
        $this->attribute = $attribute;
        $this->value = $value;
    }

    public function getAttribute()
    {
        return $this->attribute;
    }

    public function getValue()
    {
        return $this->value;
    }
}
