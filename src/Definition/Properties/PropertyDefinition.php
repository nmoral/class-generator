<?php

declare(strict_types=1);

namespace SolidDevelopment\ClassGenerator\Definition\Properties;

use SolidDevelopment\ClassGenerator\Definition\LevelInterface;
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
        $property = sprintf(
            '%s%s',
            str_repeat(' ', $this->level * 4),
            $this->options->getVisibility(),
        );
        if ($this->options->isReadonly()) {
            $property .= ' readonly';
        }
        if ($this->options->isStatic()) {
            $property .= ' static';
        }

        $property = sprintf(
            '%s %s $%s',
            $property,
            $this->options->getType(),
            $this->options->getName(),
        );

        if ($this->options->hasValue()) {
            $property .= ' = '.$this->options->getValue();
        }

        return sprintf('%s;', $property);
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
