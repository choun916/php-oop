<?php

namespace PhpOop\Core\Domain\CurriculumVitae;

class CareerSection extends CVSectionAbstract implements CVSectionInterface
{
    function __construct(
        private readonly string $company,
        private readonly string $department,
        private readonly string $position,
        private readonly string $startDate,
        private readonly string $endData,
        private readonly string $inOffice,
        private readonly string $contents
    ) {}

    protected function type(): string
    {
        return self::TYPE_CAREER;
    }

    protected function title(): string
    {
        return '경력';
    }
}