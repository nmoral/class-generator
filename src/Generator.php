<?php

declare(strict_types=1);

namespace SolidDevelopment\ClassGenerator;

use SolidDevelopment\ClassGenerator\Definition\Definition;

class Generator
{
    /**
     */
    public function generate(Definition $definition): int
    {
        try {
            $this->_doGenerate($definition);
        } catch (\Exception $e) {
            return 1;
        }

        return 0;
    }

    private function _doGenerate(Definition $classDefinition): void
    {
        $this->createDirectory($classDefinition);
        file_put_contents($classDefinition->getFilePath(), (string)$classDefinition);
    }

    private function createDirectory(Definition $classDefinition): void
    {
        if (is_dir($classDefinition->getDirectory())) {
            return;
        }
        mkdir($classDefinition->getDirectory(), 0700, true);
    }
}
