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
        return (string) $this->fileDefinition;
    }

    public function getFilePath(): string
    {
        return $this->rootDir . $this->fileDefinition->getClassPath();
    }

    /**
     */
    public function getDirectory(): string
    {
        return dirname($this->getFilePath());
    }
}
