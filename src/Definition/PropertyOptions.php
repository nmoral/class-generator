<?php

declare(strict_types=1);

namespace SolidDevelopment\ClassGenerator\Definition;

class PropertyOptions extends AbstractOptions
{
    public function __construct(
        string $name,
        private readonly string $visibility = 'public',
        private readonly string $type = 'mixed',
        private readonly ?string $value = null,
    )
    {
        parent::__construct($name);
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
}
