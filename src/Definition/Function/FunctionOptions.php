<?php

declare(strict_types=1);

namespace SolidDevelopment\ClassGenerator\Definition\Function;

use SolidDevelopment\ClassGenerator\Definition\ModifierOptions;

class FunctionOptions extends ModifierOptions
{
    public function __construct(
        string $name,
        string $visibility = 'public',
        bool $static = false,
        private readonly ?ReturnType $returnType = null,
    ) {
        parent::__construct($name, $visibility, $static);
    }

    public function hasReturnType(): bool
    {
        return null !== $this->getReturnType();
    }

    public function getReturnType(): ?ReturnType
    {
        return $this->returnType;
    }
}
