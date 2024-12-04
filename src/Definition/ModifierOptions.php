<?php

declare(strict_types=1);

namespace SolidDevelopment\ClassGenerator\Definition;

abstract class ModifierOptions extends AbstractOptions
{
    public function __construct(
        string $name,
        protected readonly string $visibility = 'public',
        protected readonly bool $static = false,
    )
    {
        parent::__construct($name);
    }

    public function getVisibility(): string
    {
        return $this->visibility;
    }

    public function isStatic(): bool
    {
        return $this->static;
    }
}
