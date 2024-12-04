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
        $indetation = $this->getIndentation();
        $functionSignature = sprintf(
            '%s%s function %s()',
            $indetation,
            $this->options->getVisibility(),
            $this->options->getName(),
        );

        if ($this->options->hasReturnType()) {
            $functionSignature .= ': '.$this->options->getReturnType();
        }

        return $functionSignature.PHP_EOL.$indetation.'{'.PHP_EOL.$indetation.'}';
    }

    private function getIndentation(): string
    {
        $indetation = str_repeat(' ', $this->level * 4);

        return $indetation;
    }
}
