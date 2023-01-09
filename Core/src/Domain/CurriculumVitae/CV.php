<?php

namespace PhpOop\Core\Domain\CurriculumVitae;

use PhpOop\Core\Repository\CurriculumVitae\Dto\CurriculumVitaeDto;

class CV
{
    private CurriculumVitaeDto $cvDto;
    private array $sections = [];
    private string $cvTitle;

    public function __construct(?int $cvId, string $cvTitle, CVSectionInterface ...$sections)
    {
        $this->cvDto = new CurriculumVitaeDto($cvId, $cvTitle);
        $this->sections = $sections;
    }

    public function getDto(): CurriculumVitaeDto
    {
        return $this->cvDto;
    }

}