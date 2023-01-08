<?php

namespace PhpOop\Core\Domain\CurriculumVitae;

use Exception;
use PhpOop\Core\Repository\CurriculumVitae\Dto\CurriculumVitaeDto;
use PhpOop\Core\Repository\DtoInterface;

class CV
{
    private DtoInterface $cvDto;
    private array $sections = [];
    private string $cvTitle;

    public function __construct(?int $cvId, string $cvTitle, CVSectionInterface ...$sections)
    {
        $this->cvDto = new CurriculumVitaeDto($cvId, $cvTitle);
        $this->sections = $sections;
    }

    public function getDto(): DtoInterface
    {
        return $this->cvDto;
    }

}