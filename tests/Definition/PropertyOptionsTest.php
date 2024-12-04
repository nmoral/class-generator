<?php

declare(strict_types=1);

namespace SolidDevelopment\ClassGenerator\Tests\Definition;

use PHPUnit\Framework\Attributes\Test;
use SolidDevelopment\ClassGenerator\Definition\Properties\PropertyOptions;
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

    #[test]
    public function validateReadonlyWithStatic(): void
    {
        self::expectException(InvalidPropertyDefinition::class);

        new PropertyOptions('name', static: true, readonly: true);
    }
}
