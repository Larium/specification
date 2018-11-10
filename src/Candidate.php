<?php

declare(strict_types = 1);

namespace Larium\Specification;

class Candidate
{
    private $params;

    public function __construct(array $params)
    {
        $this->params = $params;
    }

    public function get($key, $default = null)
    {
        return array_key_exists($key, $this->params)
            ? $this->params[$key]
            : $default;
    }
}
