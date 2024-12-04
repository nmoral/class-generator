<?php

declare(strict_types=1);

namespace SolidDevelopment\ClassGenerator\Definition\Function;

use SolidDevelopment\ClassGenerator\Definition\DefinitionCollection;
use SolidDevelopment\ClassGenerator\Definition\ModifierOptions;

class FunctionOptions extends ModifierOptions
{
    public function __construct(
        string $name,
        string $visibility = 'public',
        bool $static = false,
        private readonly ?ReturnType $returnType = null,
        private readonly ?DefinitionCollection $parameters = null,
    ) {
        parent::__construct($name, $visibility, $static);
    }

    public function getReturnType(): ?ReturnType
    {
        return $this->returnType;
    }

    public function getParameters(): ?DefinitionCollection
    {
        return $this->parameters;
    }

    public function hasParameters(): bool
    {
        return null !== $this->parameters;
    }

    public function hasReturnType(): bool
    {
        return null !== $this->returnType;
    }
}
