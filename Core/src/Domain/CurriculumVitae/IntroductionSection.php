<?php

namespace PhpOop\Core\Domain\CurriculumVitae;

class IntroductionSection extends CVSectionAbstract implements CVSectionInterface
{
    function __construct(private readonly string $contents)
    {
    }

    protected function title(): string
    {
        return '자기소개';
    }
}