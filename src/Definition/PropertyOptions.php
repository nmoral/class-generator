<?php

declare(strict_types=1);

namespace SolidDevelopment\ClassGenerator\Definition;

use SolidDevelopment\ClassGenerator\Exception\InvalidPropertyDefinition;

class PropertyOptions extends AbstractOptions
{
    public function __construct(
        string $name,
        private readonly string $visibility = 'public',
        private readonly string $type = 'mixed',
        private readonly ?string $value = null,
        private readonly bool $static = false,
    )
    {
        parent::__construct($name);
        if (!in_array($this->visibility, ['public', 'protected', 'private'], true)) {
            throw new InvalidPropertyDefinition('Invalid visibility');
        }
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getVisibility(): string
    {
        return $this->visibility;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function hasValue(): bool
    {
        return null !== $this->getValue();
    }

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function isStatic(): bool
    {
        return $this->static;
    }
}
