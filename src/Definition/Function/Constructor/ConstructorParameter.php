<?php

declare(strict_types=1);

namespace SolidDevelopment\ClassGenerator\Definition\Function\Constructor;

use SolidDevelopment\ClassGenerator\Definition\Function\FunctionParameter;


class ConstructorParameter extends FunctionParameter
{
    public function __construct(ConstructorParameterOptions $options)
    {
        parent::__construct($options);
    }

    protected function getCommonPart(): string
    {
        $commonPart = parent::getCommonPart();
        $specificPart = '';
        if ($this->options->isGlobal()) {
            $specificPart .= $this->options->getVisibility() . ' ';
        }

        if ($this->options->isReadonly()) {
            $specificPart .= 'readonly ';
        }

        return $specificPart.$commonPart;
    }
}
