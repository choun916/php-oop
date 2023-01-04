<?php

namespace PhpOop\Core\Domain\CurriculumVitae;

abstract class CVSectionAbstract
{
    abstract protected function type(): string;
    abstract protected function title(): string;
}