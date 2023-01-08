<?php

namespace PhpOop\Core\Repository\CurriculumVitae;

use PhpOop\Core\Repository\CurriculumVitae\Dto\CurriculumVitaeDto;

interface CVRepositoryInterface
{
    public function updateCurriculumVitae(CurriculumVitaeDto $cvDto): int;
    public function updateSection($section): bool;
}