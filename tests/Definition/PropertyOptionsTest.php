<?php

declare(strict_types=1);

namespace SolidDevelopment\ClassGenerator\Tests\Definition;

use PHPUnit\Framework\Attributes\Test;
use SolidDevelopment\ClassGenerator\Definition\PropertyOptions;
use PHPUnit\Framework\TestCase;
use SolidDevelopment\ClassGenerator\Exception\InvalidPropertyDefinition;

class PropertyOptionsTest extends TestCase
{
    #[test]
    public function validPropertyOptions(): void
    {
        self::expectException(InvalidPropertyDefinition::class);

        new PropertyOptions('name', visibility: 'fake');
    }
}
