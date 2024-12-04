<?php

declare(strict_types=1);

namespace SolidDevelopment\ClassGenerator\Definition;

class PropertyOptions extends AbstractOptions
{
    public function __construct(
        string $name,
        private readonly string $visibility = 'public',
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
}
