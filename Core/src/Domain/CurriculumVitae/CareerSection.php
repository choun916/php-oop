<?php

namespace PhpOop\Core\Domain\CurriculumVitae;

use PhpOop\Core\Repository\CurriculumVitae\Dto\CareerSectionDto;

class CareerSection extends CVSectionAbstract
{
    function __construct(
        ?int    $id,
        string  $company,
        string  $department,
        string  $position,
        string  $startDate,
        ?string $endData,
        bool    $inOffice,
        string  $detail
    )
    {
        parent::__construct($id);
        $this->dto = new CareerSectionDto(
            $id,
            $this->type(),
            $company,
            $department,
            $position,
            $startDate,
            $endData,
            $inOffice,
            $detail
        );
    }

    public function type(): string
    {
        return self::TYPE_CAREER;
    }

    public function title(): string
    {
        return '경력';
    }
}