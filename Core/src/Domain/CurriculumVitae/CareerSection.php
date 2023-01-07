<?php

namespace PhpOop\Core\Domain\CurriculumVitae;

class CareerSection extends CVSectionAbstract
{
    private string $company;
    private string $department;
    private string $position;
    private string $startDate;
    private ?string $endData;
    private bool $inOffice;
    private string $detail;

    function __construct(
        ?int $id,
        string $company,
        string $department,
        string $position,
        string $startDate,
        ?string $endData,
        bool $inOffice,
        string $detail
    ) {
        parent::__construct($id);
        $this->detail = $detail;
        $this->inOffice = $inOffice;
        $this->endData = $endData;
        $this->startDate = $startDate;
        $this->position = $position;
        $this->department = $department;
        $this->company = $company;
    }

    public function type(): string
    {
        return self::TYPE_CAREER;
    }

    public function title(): string
    {
        return '경력';
    }

    public function contents(): array
    {
        return [
            'company' => $this->company,
            'department' => $this->department,
            'position' => $this->position,
            'startDate' => $this->startDate,
            'endData' => $this->endData,
            'inOffice' => $this->inOffice,
            'detail' => $this->detail,
        ];
    }
}