<?php

declare(strict_types=1);

namespace SolidDevelopment\ClassGenerator\Definition;

class ClassOptions
{
    public function __construct(
        private readonly string $className,
    )
    {
    }

    public function getClassName(): string
    {
        return ucfirst($this->className);
    }
}
