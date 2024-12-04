<?php

declare(strict_types=1);

namespace SolidDevelopment\ClassGenerator\Definition;

use SolidDevelopment\ClassGenerator\Definition\Class\ClassDefinition;
use Stringable;

class FileDefinition implements Stringable
{

    public function __construct(
        private readonly ClassDefinition $classDefinition,
    )
    {
    }

    public function __toString(): string
    {
        $classDefinition = (string) $this->classDefinition;

        return <<<PHP
<?php

declare(strict_types=1);

{$classDefinition}

PHP;

    }

    public function getClassPath(): string
    {
        return $this->classDefinition->getClassPath();
    }
}
