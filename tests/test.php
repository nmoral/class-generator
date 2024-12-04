<?php

declare(strict_types=1);

namespace SolidDevelopment\ClassGenerator\tests\Tests;

class Test
{
    public static string|null $test = null;

    public readonly mixed $test2;

    public function __construct(
        private array $content = [],
    )
    {
    }

    public function test(
        string $str = 'str',
        int $int = 1,
    ): string|null
    {
    }

    private function test2(
        string $str = 'str',
    ): string
    {
    }
}
