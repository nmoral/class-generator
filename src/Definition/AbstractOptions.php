<?php

declare(strict_types=1);

namespace SolidDevelopment\classGenerator\Definition;

use Stringable;

abstract class AbstractOptions
{
    public function __construct(
        protected readonly string $name,
    )
    {
    }
}
