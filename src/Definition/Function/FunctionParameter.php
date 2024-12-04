<?php

declare(strict_types=1);

namespace SolidDevelopment\ClassGenerator\Definition\Function;

use SolidDevelopment\ClassGenerator\Definition\LevelInterface;
use Stringable;

class FunctionParameter implements Stringable, LevelInterface
{
    private int $level;

    public function __construct(
        private readonly ParameterOptions $options,
    )
    {
    }

    public function __toString(): string
    {
        $parameter = sprintf(
            '%s%s $%s',
            $this->getIndentations(),
            $this->options->getTypes(),
            $this->options->getName(),
        );

        if ($this->options->hasDefaultValue()) {
            $parameter .= ' = '.$this->options->getDefaultValue();
        }

        $parameter .= ',';

        return $parameter;
    }

    public function setLevel(int $level): void
    {
        $this->level = $level;
    }

    private function getIndentations(): string
    {
        return str_repeat(' ', $this->level * 4);
    }
}
