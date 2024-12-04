<?php

declare(strict_types=1);

namespace SolidDevelopment\ClassGenerator\Definition\Class;

use SolidDevelopment\classGenerator\Definition\AbstractOptions;

class ClassOptions extends AbstractOptions
{
    public function __construct(
        string $name,
        Private readonly NamespaceDefinition $namespace,
    )
    {
        parent::__construct($name);
    }

    public function getClassName(): string
    {
        return ucfirst($this->name);
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
