<?php

namespace PhpOop\Core\Service\CurriculumVitae;

use PhpOop\Core\Domain\CurriculumVitae\CVBuilder;
use PhpOop\Core\Repository\CurriculumVitae\CVRepositoryInterface;
use PhpOop\Core\Repository\CurriculumVitae\Dto\CurriculumVitaeDto;
use PhpOop\Core\Repository\CurriculumVitae\Dto\SectionDtoInterface;

interface CVServiceInterface
{
    public function __construct(CVRepositoryInterface $repository);

    public function cvBuilder(?int $cvId, string $cvTitle): CVBuilder;

    public function save(CurriculumVitaeDto $cvDto, SectionDtoInterface ...$sectionDtoList): bool;
}