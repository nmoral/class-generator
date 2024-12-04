<?php

declare(strict_types=1);

namespace SolidDevelopment\ClassGenerator\Definition;

use Stringable;

class ClassDefinition implements Stringable
{
    public function __construct(
        private readonly ClassOptions $options,
        private readonly ?DefinitionCollection $properties = null,
    )
    {
    }

    public function __toString(): string
    {
        $properties = $this->properties ?? '';
        return <<<PHP
namespace {$this->options->FCQN()};

class {$this->options->getClassName()}
{
{$properties}
}
PHP;

    }

    public function getClassPath(): string
    {
        return $this->options->getPath();
    }
}
