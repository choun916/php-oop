<?php

namespace PhpOop\Core\Repository\CurriculumVitae;

interface CVRepositoryInterface
{
    public function insert($cv): bool;
}