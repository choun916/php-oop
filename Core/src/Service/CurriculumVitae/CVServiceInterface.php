<?php

namespace PhpOop\Core\Service\CurriculumVitae;

use PhpOop\Core\Domain\CurriculumVitae\CV;
use PhpOop\Core\Domain\CurriculumVitae\CVBuilder;
use PhpOop\Core\Repository\CurriculumVitae\CVRepositoryInterface;

interface CVServiceInterface
{
    public function __construct(CVRepositoryInterface $repository);

    public function cvBuilder(?int $cvId, string $cvTitle): CVBuilder;

    public function save(CV $cv): bool;
}