<?php

declare(strict_types=1);

namespace SolidDevelopment\ClassGenerator\Definition;

use Iterator;
use Stringable;

class DefinitionCollection implements Stringable, Iterator
{
    private int $index = 0;

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

    public function current(): mixed
    {
        return $this->definitions[$this->index];
    }

    public function next(): void
    {
        ++$this->index;
    }

    public function key(): mixed
    {
        return $this->index;
    }

    public function valid(): bool
    {
        return array_key_exists($this->index, $this->definitions);
    }

    public function rewind(): void
    {
        $this->index = 0;
    }
}
