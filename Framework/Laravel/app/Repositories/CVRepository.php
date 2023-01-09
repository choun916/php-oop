<?php

namespace App\Repositories;

use PhpOop\Core\Repository\CurriculumVitae\CVRepositoryInterface;
use PhpOop\Core\Repository\CurriculumVitae\Dto\CurriculumVitaeDto;
use PhpOop\Core\Repository\CurriculumVitae\Dto\SectionDtoInterface;

class CVRepository extends RepositoryAbstract implements CVRepositoryInterface
{
    public function updateCurriculumVitae(CurriculumVitaeDto $cvDto): int
    {
        $id = $cvDto->getId();
        $table = $this->writeDB()->table('curriculumVitae');

        if ($id > 0) {
            $table->where('id', $id)
                ->update(['title' => $cvDto->getTitle()]);
        } else {
            $id = $table->insertGetId([
                'title' => $cvDto->getTitle()
            ]);
        }

        return $id;
    }

    public function updateSection(int $cvId, SectionDtoInterface $sectionDto): bool
    {
        $id = $sectionDto->getId();
        $table = $this->writeDB()->table($sectionDto->getType());

        if ($id > 0) {
            $table->where('id', $id)->update($sectionDto->getData());
        } else {
            $id = $table->insertGetId(array_merge(['cvId' => $cvId], $sectionDto->getData()));
        }

        return $id > 0;
    }
}
