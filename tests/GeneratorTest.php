<?php

declare(strict_types=1);

namespace SolidDevelopment\ClassGenerator\Tests;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use SolidDevelopment\ClassGenerator\Definition\ClassDefinition;
use SolidDevelopment\ClassGenerator\Definition\ClassOptions;
use SolidDevelopment\ClassGenerator\Definition\FileDefinition;
use SolidDevelopment\ClassGenerator\Definition\NamespaceDefinition;
use SolidDevelopment\ClassGenerator\Definition\PhpDefinition;
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
                            'SolidDevelopment\ClassGenerator',
                            ['Tests'],
                        )
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
        unlink($definition->getFilePath());
    }
}
