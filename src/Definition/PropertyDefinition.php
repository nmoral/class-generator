<?php

declare(strict_types=1);

namespace SolidDevelopment\ClassGenerator\Definition;

use Stringable;

class PropertyDefinition implements Stringable
{
    public function __construct(
        private readonly PropertyOptions $options,
    ) {
    }

    public function __toString(): string
    {
        return sprintf(
            '%s $%s;',
            $this->options->getVisibility(),
            $this->options->getName()
        );
    }
}
