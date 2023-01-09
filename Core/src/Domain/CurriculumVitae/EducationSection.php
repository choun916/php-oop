<?php

namespace PhpOop\Core\Domain\CurriculumVitae;

use PhpOop\Core\Repository\CurriculumVitae\Dto\EducationSectionDto;

class EducationSection extends CVSectionAbstract
{
    function __construct(
        ?int    $id,
        string  $name,
        string  $major,
        string  $startDate,
        ?string $endData,
        bool    $inAttend,
        string  $detail
    )
    {
        parent::__construct($id);
        $this->dto = new EducationSectionDto(
            $id,
            $this->type(),
            $name,
            $major,
            $startDate,
            $endData,
            $inAttend,
            $detail
        );
    }

    public function type(): string
    {
        return self::TYPE_EDUCTION;
    }

    public function title(): string
    {
        return '학력';
    }
}