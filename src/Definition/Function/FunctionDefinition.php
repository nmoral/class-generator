<?php

declare(strict_types=1);

namespace SolidDevelopment\ClassGenerator\Definition\Function;

use SolidDevelopment\ClassGenerator\Definition\LevelInterface;
use Stringable;

class FunctionDefinition implements LevelInterface, Stringable
{
    private int $level;

    /**
     * @param FunctionOptions $options
     */
    public function __construct(
        private readonly FunctionOptions $options
    )
    {
    }

    public function setLevel(int $level): void
    {
        $this->level = $level;
    }

    public function __toString(): string
    {
        return sprintf(
            '%s%s function %s(){}',
            str_repeat(' ', $this->level * 4),
            $this->options->getVisibility(),
            $this->options->getName(),
        );
    }
}
