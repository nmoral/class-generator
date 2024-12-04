<?php

declare(strict_types=1);

namespace SolidDevelopment\ClassGenerator\Definition\Function;

use SolidDevelopment\ClassGenerator\Definition\LevelInterface;
use Stringable;

class FunctionParameter implements Stringable, LevelInterface
{
    private int $level;

    public function __construct(
        protected readonly ParameterOptions $options,
    )
    {
    }

    public function __toString(): string
    {
        $parameter = $this->getCommonPart();

        return $this->getIndentations().$parameter;
    }

    public function setLevel(int $level): void
    {
        $this->level = $level;
    }

    private function getIndentations(): string
    {
        return str_repeat(' ', $this->level * 4);
    }

    protected function getCommonPart(): string
    {
        $parameter = sprintf(
            '%s $%s',
            $this->options->getTypes(),
            $this->options->getName(),
        );

        if ($this->options->hasDefaultValue()) {
            $parameter .= ' = '.$this->options->getDefaultValue();
        }

        $parameter .= ',';

        return $parameter;
    }
}
