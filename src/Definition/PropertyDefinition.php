<?php

declare(strict_types=1);

namespace SolidDevelopment\ClassGenerator\Definition;

use Stringable;

class PropertyDefinition implements Stringable, LevelInterface
{
    private int $level;

    public function __construct(
        private readonly PropertyOptions $options,
    ) {
    }

    public function __toString(): string
    {
        return sprintf(
            '%s%s $%s;',
            str_repeat(' ', $this->level * 4),
            $this->options->getVisibility(),
            $this->options->getName()
        );
    }

    public function setLevel(int $level): void
    {
        $this->level = $level;
    }

    public function getName(): string
    {
        return $this->options->getName();
    }
}
