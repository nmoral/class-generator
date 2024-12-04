<?php

declare(strict_types=1);

namespace SolidDevelopment\ClassGenerator\Definition\Function;

use SolidDevelopment\classGenerator\Definition\AbstractOptions;

class ParameterOptions extends AbstractOptions
{
    public function __construct(
        string $name,
        private array $types = ['mixed'],
        private mixed $defaultValue = null,
    ) {
        parent::__construct($name);
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
