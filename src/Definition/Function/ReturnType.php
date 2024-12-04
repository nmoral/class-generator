<?php

declare(strict_types=1);

namespace SolidDevelopment\ClassGenerator\Definition\Function;

use Stringable;

class ReturnType implements Stringable
{
    public function __construct(
        private readonly array $types,
    )
    {
    }


    public function __toString(): string
    {
        return implode('|', $this->types);
    }
}
