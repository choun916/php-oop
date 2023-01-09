<?php

namespace PhpOop\Core\Repository\CurriculumVitae;

use PhpOop\Core\Repository\CurriculumVitae\Dto\CurriculumVitaeDto;
use PhpOop\Core\Repository\CurriculumVitae\Dto\SectionDtoInterface;

interface CVRepositoryInterface
{
    public function updateCurriculumVitae(CurriculumVitaeDto $cvDto): int;
    public function updateSection(int $cvId, SectionDtoInterface $sectionDto): bool;
}