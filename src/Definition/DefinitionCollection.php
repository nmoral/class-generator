<?php

declare(strict_types=1);

namespace SolidDevelopment\ClassGenerator\Definition;

use Stringable;

class DefinitionCollection implements Stringable
{
    public function __construct(
        private readonly array $definitions = [],
        int $level = 1,
    ) {
        foreach ($this->definitions as $definition) {
            if ($definition instanceof LevelInterface) {
                $definition->setLevel($level);
            }
        }
    }

    public function __toString(): string
    {
        return implode(PHP_EOL.PHP_EOL, $this->definitions);
    }
}
