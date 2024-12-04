<?php

declare(strict_types=1);

namespace SolidDevelopment\ClassGenerator\Definition\Class;

use SolidDevelopment\ClassGenerator\Definition\DefinitionCollection;
use SolidDevelopment\ClassGenerator\Definition\Properties\PropertyDefinition;
use SolidDevelopment\ClassGenerator\Exception\InvalidClassDefinition;
use Stringable;

class ClassDefinition implements Stringable
{
    public function __construct(
        private readonly ClassOptions $options,
        private readonly ?DefinitionCollection $properties = null,
        private readonly ?DefinitionCollection $methods = null,
    )
    {
        if ($this->properties) {
            $names = array_map(
                fn (PropertyDefinition $property) => $property->getName(),
                iterator_to_array($this->properties)
            );

            $counts = array_count_values($names);
            foreach ($counts as $name => $count) {
                if ($count > 1) {
                    throw new InvalidClassDefinition("Property $name is defined more than once");
                }
            }
        }
    }

    public function __toString(): string
    {
        $properties = $this->properties ?? '';
        $methods = $this->methods ?? '';
        $body = $properties.$methods;
        return <<<PHP
namespace {$this->options->FCQN()};

class {$this->options->getClassName()}
{{$body}}
PHP;

    }

    public function getClassPath(): string
    {
        return $this->options->getPath();
    }
}
