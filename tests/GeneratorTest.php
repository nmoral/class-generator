<?php

declare(strict_types=1);

namespace SolidDevelopment\ClassGenerator\Tests;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use SolidDevelopment\ClassGenerator\Definition\Class\ClassDefinition;
use SolidDevelopment\ClassGenerator\Definition\Class\ClassOptions;
use SolidDevelopment\ClassGenerator\Definition\Class\NamespaceDefinition;
use SolidDevelopment\ClassGenerator\Definition\DefinitionCollection;
use SolidDevelopment\ClassGenerator\Definition\FileDefinition;
use SolidDevelopment\ClassGenerator\Definition\Function\Constructor\Constructor;
use SolidDevelopment\ClassGenerator\Definition\Function\Constructor\ConstructorParameter;
use SolidDevelopment\ClassGenerator\Definition\Function\Constructor\ConstructorParameterOptions;
use SolidDevelopment\ClassGenerator\Definition\Function\Constructor\ConstructorParameters;
use SolidDevelopment\ClassGenerator\Definition\Function\FunctionDefinition;
use SolidDevelopment\ClassGenerator\Definition\Function\FunctionOptions;
use SolidDevelopment\ClassGenerator\Definition\Function\FunctionParameter;
use SolidDevelopment\ClassGenerator\Definition\Function\ParameterOptions;
use SolidDevelopment\ClassGenerator\Definition\Function\ReturnType;
use SolidDevelopment\ClassGenerator\Definition\PhpDefinition;
use SolidDevelopment\ClassGenerator\Definition\Properties\PropertyDefinition;
use SolidDevelopment\ClassGenerator\Definition\Properties\PropertyOptions;
use SolidDevelopment\ClassGenerator\Exception\InvalidClassDefinition;
use SolidDevelopment\ClassGenerator\Generator;
use const PHP_EOL;

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
                                    static: true,
                                    type: 'string|null',
                                    value: 'null',
                                )
                            ),
                            new PropertyDefinition(
                                new PropertyOptions(
                                    'test2',
                                    readonly: true,
                                )
                            ),
                        ]
                    ),
                    new DefinitionCollection([
                        new FunctionDefinition(
                            new FunctionOptions(
                                'test',
                                returnType: new ReturnType([
                                    'string',
                                    'null',
                                ]),
                                parameters: new DefinitionCollection([
                                    new FunctionParameter(
                                        new ParameterOptions(
                                            'str',
                                            ['string'],
                                            '\'str\''
                                        )
                                    ),
                                    new FunctionParameter(
                                        new ParameterOptions(
                                            'int',
                                            ['int'],
                                            '1'
                                        )
                                    ),
                                ], 2, PHP_EOL),
                            ),
                        ),
                        new FunctionDefinition(
                            new FunctionOptions(
                                'test2',
                                visibility: 'private',
                                returnType: new ReturnType([
                                    'string',
                                ]),
                                parameters: new DefinitionCollection([
                                    new FunctionParameter(
                                        new ParameterOptions(
                                            'str',
                                            ['string'],
                                            '\'str\''
                                        )
                                    ),
                                ], 2, PHP_EOL),
                            ),
                        ),
                        new Constructor(
                            parameters: new DefinitionCollection([
                                new ConstructorParameter(
                                    new ConstructorParameterOptions(
                                        'content',
                                        ['array'],
                                        '[]',
                                        'private',
                                        false
                                    )),
                            ], 2, PHP_EOL)
                        ),
                    ])
                )
            ),
            './build/'
        );
        $result = $generator->generate(
            $definition
        );
        self::assertSame(0, $result);
        $classContent = file_get_contents($definition->getFilePath());

        self::assertSame(file_get_contents('./tests/test.php'), $classContent);
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
