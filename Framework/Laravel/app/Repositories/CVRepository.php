<?php

namespace App\Repositories;

use PhpOop\Core\Repository\CurriculumVitae\CVRepositoryInterface;
use PhpOop\Core\Repository\CurriculumVitae\Dto\CurriculumVitaeDto;

class CVRepository extends RepositoryAbstract implements CVRepositoryInterface
{
    public function updateCurriculumVitae(CurriculumVitaeDto $cvDto): int
    {
        $id = $cvDto->getId();
        if ($id > 0) {
            $this->writeDB()->table('curriculumVitae')
                ->where('id', $cvDto->getId())
                ->update(['title' => $cvDto->getTitle()]);
        } else {
            $id = $this->writeDB()->table('curriculumVitae')->insertGetId([
                'title' => $cvDto->getTitle()
            ]);
        }

        return $id;
    }

    public function updateSection($section): bool
    {
        // TODO: Implement UpdateSection() method.
    }
}
