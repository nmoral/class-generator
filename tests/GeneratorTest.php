<?php

declare(strict_types=1);

namespace SolidDevelopment\ClassGenerator\Tests;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use SolidDevelopment\ClassGenerator\Generator;

class GeneratorTest extends TestCase
{
    #[Test]
    public function generate(): void
    {
        $generator = new Generator();
    }
}
