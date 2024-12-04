<?php

declare(strict_types=1);

namespace SolidDevelopment\ClassGenerator\Definition;

class PhpDefinition implements Definition
{

    public function __construct(
        private readonly FileDefinition $fileDefinition,
        private readonly string $rootDir,
    )
    {
    }

    public function __toString(): string
    {
        return $this->fileDefinition;
    }

    public function getFileName(): string
    {
        return $this->rootDir . $this->fileDefinition->getClassName() . '.php';
    }
}
