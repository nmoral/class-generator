<?php

declare(strict_types=1);

namespace SolidDevelopment\ClassGenerator\Definition;

use SolidDevelopment\ClassGenerator\Exception\InvalidPropertyDefinition;

class PropertyOptions extends ModifierOptions
{
    public function __construct(
        string $name,
        string $visibility = 'public',
        bool $static = false,
        private readonly string $type = 'mixed',
        private readonly ?string $value = null,
        private readonly bool $readonly = false,
    )
    {
        parent::__construct($name, $visibility, $static);
        if (!in_array($this->visibility, ['public', 'protected', 'private'], true)) {
            throw new InvalidPropertyDefinition('Invalid visibility');
        }

        if ($this->readonly && $this->static) {
            throw new InvalidPropertyDefinition('Readonly properties cannot be static');
        }
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

    public function isReadonly(): bool
    {
        return $this->readonly;
    }
}
