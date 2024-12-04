<?php

declare(strict_types=1);

namespace SolidDevelopment\classGenerator\Definition;

use Stringable;

interface Definition extends Stringable
{
    public function getFilePath(): string;

    public function getDirectory(): string;
}
