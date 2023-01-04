<?php

namespace PhpOop\Core\Domain\CurriculumVitae;

class PorfileSection extends CVSectionAbstract implements CVSectionInterface
{
    function __construct(private readonly string $title) {

    }

    protected function title(): string
    {
        return '인적사항';
    }
}