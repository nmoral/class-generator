<?php

declare(strict_types=1);

namespace SolidDevelopment\ClassGenerator\Definition\Function;

use SolidDevelopment\ClassGenerator\Definition\ModifierOptions;

class FunctionOptions extends ModifierOptions
{
    public function __construct(
        string $name,
        string $visibility = 'public',
        bool $static = false
    ) {
        parent::__construct($name, $visibility, $static);
    }

}
