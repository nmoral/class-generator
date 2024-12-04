<?php

declare(strict_types=1);

namespace SolidDevelopment\ClassGenerator\Definition;

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
        return <<<PHP
<?php

${$this->classDefinition}
PHP;

    }
}
