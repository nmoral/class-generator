<?php

declare(strict_types=1);

namespace SolidDevelopment\ClassGenerator\Definition\Class;

class NamespaceDefinition
{
    public function __construct(
        private readonly string $root,
        private readonly array $parts,
    )
    {
    }

    public function namespace(): string
    {
        return implode('\\', [$this->root, ...$this->parts]);
    }

    /**
     */
    public function path(): string
    {
        return implode('/', $this->parts);
    }
}
