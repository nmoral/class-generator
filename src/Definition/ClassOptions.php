<?php

declare(strict_types=1);

namespace SolidDevelopment\ClassGenerator\Definition;

class ClassOptions
{
    public function __construct(
        private readonly string $className,
        Private readonly NamespaceDefinition $namespace,
    )
    {
    }

    public function getClassName(): string
    {
        return ucfirst($this->className);
    }

    /**
     */
    public function FCQN(): string
    {
        return $this->namespace->namespace();
    }

    /**
     */
    public function getPath(): string
    {
        return $this->namespace->path().'/'.$this->getClassName().'.php';
    }
}
