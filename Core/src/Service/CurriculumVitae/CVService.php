<?php

namespace PhpOop\Core\Service\CurriculumVitae;

use PhpOop\Core\Domain\CurriculumVitae\CVBuilder;
use PhpOop\Core\Repository\CurriculumVitae\CVRepositoryInterface;

class CVService implements CVServiceInterface
{
    private array $sectionList;
    private CVRepositoryInterface $cvRepository;

    public function __construct(CVRepositoryInterface $cvRepository)
    {
        $this->cvRepository = $cvRepository;
    }

    public function cvBuilder(): CVBuilder
    {
        return new CVBuilder();
    }

    public function save($cv): bool
    {
        $this->cvRepository->insert($cv);
        return true;
    }
}