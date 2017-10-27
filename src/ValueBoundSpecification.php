<?php

declare(strict_types = 1);

namespace Domain;

abstract class ValueBoundSpecification extends LeafSpecification
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

    public function isGeneralizationOf(Specification $specification): bool
    {
        return $this->subsumptionProcess('isGeneralizationOf', $specification);
    }

    public function isSpecialCaseOf(Specification $specification): bool
    {
        return $this->subsumptionProcess('isSpecialCaseOf', $specification);
    }

    private function subsumptionProcess(string $type, ValueBoundSpecification $specification): bool
    {
        $parentClasses = $this->getBaseNameOfParentClasses(get_class($specification));

        foreach ($parentClasses as $name) {
            $method = sprintf('%s%s', $type, $name);

            if (is_callable([$this, $method])) {
                return $this->$method($specification);
            }
        }

        return false;
    }

    private function getBaseNameOfParentClasses(string $specificationClass): array
    {
        $parents = class_parents($specificationClass);
        array_unshift($parents, $this->getClassBaseName($specificationClass));

        return array_map([$this, 'getClassBaseName'], $parents);
    }

    private function getClassBaseName(string $className): string
    {
        $parts = explode('\\', $className);

        return end($parts);
    }
}
