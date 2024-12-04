<?php

declare(strict_types=1);

namespace SolidDevelopment\ClassGenerator\Definition;

use Stringable;

class ClassDefinition implements Stringable
{
    public function __construct(
        private readonly ClassOptions $options,
    )
    {
    }

    public function __toString(): string
    {
        return <<<PHP
namespace {$this->options->FCQN()};

class {$this->options->getClassName()}
{

}
PHP;

    }

    public function getClassPath(): string
    {
        return $this->options->getPath();
    }
}
