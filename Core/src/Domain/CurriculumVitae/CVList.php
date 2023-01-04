<?php

namespace PhpOop\Core\Domain\CurriculumVitae;

class CVList implements CVListInterface
{
    public function __construct(CVSectionInterface ...$CVItem)
    {

    }

}