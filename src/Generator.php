<?php

declare(strict_types=1);

namespace SolidDevelopment\ClassGenerator;

use SolidDevelopment\ClassGenerator\Definition\Definition;

class Generator
{
    /**
     */
    public function generate(Definition $classDefinition): int
    {
        try {
            $this->_doGenerate($classDefinition);
        } catch (\Exception $e) {
            return 1;
        }
        return 0;
    }

    private function _doGenerate(Definition $classDefinition): void
    {
        file_put_contents($classDefinition->getFileName(), (string) $classDefinition);
    }
}
