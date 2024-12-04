<?php

declare(strict_types=1);

namespace SolidDevelopment\ClassGenerator\Definition\Function;

class ParameterOptions
{
    public function __construct(
        private string $name,
        private array $types = ['mixed'],
        private mixed $defaultValue = null,
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getTypes(): string
    {
        return implode('|', $this->types);
    }

    public function isNullable(): bool
    {
        return $this->nullable;
    }

    public function getDefaultValue(): mixed
    {
        return $this->defaultValue;
    }

    public function hasDefaultValue(): bool
    {
        return null !== $this->getDefaultValue();
    }
}
