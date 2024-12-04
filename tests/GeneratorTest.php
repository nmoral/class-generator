<?php

declare(strict_types=1);

namespace SolidDevelopment\ClassGenerator\Tests;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use SolidDevelopment\ClassGenerator\Definition\ClassDefinition;
use SolidDevelopment\ClassGenerator\Definition\ClassOptions;
use SolidDevelopment\ClassGenerator\Definition\DefinitionCollection;
use SolidDevelopment\ClassGenerator\Definition\FileDefinition;
use SolidDevelopment\ClassGenerator\Definition\NamespaceDefinition;
use SolidDevelopment\ClassGenerator\Definition\PhpDefinition;
use SolidDevelopment\ClassGenerator\Definition\PropertyDefinition;
use SolidDevelopment\ClassGenerator\Definition\PropertyOptions;
use SolidDevelopment\ClassGenerator\Exception\InvalidClassDefinition;
use SolidDevelopment\ClassGenerator\Generator;

class GeneratorTest extends TestCase
{
    #[Test]
    public function generate(): void
    {
        $generator = new Generator();

        $definition = new PhpDefinition(
            new FileDefinition(
                new ClassDefinition(
                    new ClassOptions(
                        'test',
                        new NamespaceDefinition(
                            'SolidDevelopment\ClassGenerator\tests',
                            ['Tests'],
                        ),
                    ),
                    new DefinitionCollection(
                        [
                            new PropertyDefinition(
                                new PropertyOptions(
                                    'test',
                                    type: 'string|null',
                                    value: 'null',
                                    static: true,
                                )
                            ),
                            new PropertyDefinition(
                                new PropertyOptions(
                                    'test2',
                                )
                            ),
                        ]
                    )
                )
            ),
            './build/'
        );
        $result = $generator->generate(
            $definition
        );

        self::assertSame(0, $result);
        self::assertSame(file_get_contents('./tests/test.php'), file_get_contents($definition->getFilePath()));
        self::assertSame('./build/Tests/Test.php', $definition->getFilePath());
        unlink($definition->getFilePath());
    }

    #[Test]
    public function generateWithSameProperties(): void
    {
        self::expectException(InvalidClassDefinition::class);
        $generator = new Generator();

        $definition = new PhpDefinition(
            new FileDefinition(
                new ClassDefinition(
                    new ClassOptions(
                        'test',
                        new NamespaceDefinition(
                            'SolidDevelopment\ClassGenerator\tests',
                            ['Tests'],
                        ),
                    ),
                    new DefinitionCollection(
                        [
                            new PropertyDefinition(
                                new PropertyOptions(
                                    'test',
                                )
                            ),
                            new PropertyDefinition(
                                new PropertyOptions(
                                    'test',
                                )
                            ),
                        ]
                    )
                )
            ),
            './build/'
        );

        $generator->generate(
            $definition
        );
    }
}
