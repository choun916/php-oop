<?php

namespace PhpOop\Core\Service\CurriculumVitae;

use PhpOop\Core\Domain\CurriculumVitae\CVBuilder;
use PhpOop\Core\Repository\CurriculumVitae\CVRepositoryInterface;

interface CVServiceInterface
{
    public function __construct(CVRepositoryInterface $repository);
    public function cvBuilder(): CVBuilder;
    public function save($cv): bool;
}