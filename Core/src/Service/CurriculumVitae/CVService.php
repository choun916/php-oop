<?php

namespace PhpOop\Core\Service\CurriculumVitae;

use Exception;
use PhpOop\Core\Domain\CurriculumVitae\CV;
use PhpOop\Core\Domain\CurriculumVitae\CVBuilder;
use PhpOop\Core\Repository\CurriculumVitae\CVRepositoryInterface;

class CVService implements CVServiceInterface
{
    private CVRepositoryInterface $cvRepository;

    public function __construct(CVRepositoryInterface $cvRepository)
    {
        $this->cvRepository = $cvRepository;
    }

    public function cvBuilder(?int $cvId, string $cvTitle): CVBuilder
    {
        return new CVBuilder($cvId, $cvTitle);
    }

    /**
     * @throws Exception
     */
    public function save(CV $cv): bool
    {
        try {
            $this->cvRepository->transaction();
            $cvId = $this->cvRepository->updateCurriculumVitae($cv->getDto());
            foreach ($cv as $section)
            {
                $section->getData();
            }

            $this->insert();
            $this->cvRepository->commit();
        } catch (Exception $e ) {
            $this->cvRepository->rollback();
            throw $e;
        }

        return true;
    }
}