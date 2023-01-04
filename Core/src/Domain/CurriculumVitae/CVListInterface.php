<?php

namespace PhpOop\Core\Domain\CurriculumVitae;

interface CVListInterface
{
    public function __construct(CVSectionInterface ...$CVItem);
}