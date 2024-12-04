<?php

declare(strict_types=1);

namespace SolidDevelopment\ClassGenerator\Definition\Function\Constructor;

use SolidDevelopment\ClassGenerator\Definition\DefinitionCollection;
use SolidDevelopment\ClassGenerator\Definition\Function\FunctionDefinition;
use SolidDevelopment\ClassGenerator\Definition\Function\FunctionOptions;

class Constructor extends FunctionDefinition
{
    public function __construct(
        string $visibility = 'public',
        ?DefinitionCollection $parameters  = null
    ) {
        parent::__construct(
            new FunctionOptions(
                name: '__construct',
                visibility: $visibility,
                parameters: $parameters,
            )
        );
    }
}
