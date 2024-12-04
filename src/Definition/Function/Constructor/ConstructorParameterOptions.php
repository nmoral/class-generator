<?php

declare(strict_types=1);

namespace SolidDevelopment\ClassGenerator\Definition\Function\Constructor;

use SolidDevelopment\ClassGenerator\Definition\Function\FunctionParameter;
use SolidDevelopment\ClassGenerator\Definition\Function\ParameterOptions;

class ConstructorParameterOptions extends ParameterOptions
{

    /**
     * @param string $name
     * @param string[] $types
     * @param string $defaultValue
     */
    public function __construct(
        string $name,
        array $types,
        string $defaultValue,
        private readonly ?string $visibility = null,
        private readonly bool $readonly = false
    )
    {
        parent::__construct($name, $types, $defaultValue);
    }

    public function isGlobal(): bool
    {
        return null !== $this->visibility || $this->readonly;
    }

    public function isReadonly(): bool
    {
        return $this->readonly;
    }

    /**
     * @return string|null
     */
    public function getVisibility(): ?string
    {
        if ($this->isReadonly() && null === $this->visibility) {
            return 'public';
        }

        return $this->visibility;
    }
}
