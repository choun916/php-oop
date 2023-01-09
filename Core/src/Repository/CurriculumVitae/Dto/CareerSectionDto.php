<?php

namespace PhpOop\Core\Repository\CurriculumVitae\Dto;

use PhpOop\Core\Repository\DtoInterface;

class CareerSectionDto extends SectionDtoAbstract implements DtoInterface
{
    private string $company;
    private string $department;
    private string $position;
    private string $startDate;
    private ?string $endData;
    private bool $inOffice;
    private string $detail;

    /**
     * @param int|null $id
     * @param string $company
     * @param string $department
     * @param string $position
     * @param string $startDate
     * @param string|null $endData
     * @param bool $inOffice
     * @param string $detail
     */
    public function __construct(?int $id, string $company, string $department, string $position, string $startDate, ?string $endData, bool $inOffice, string $detail)
    {
        parent::__construct($id, self::TYPE_CAREER);
        $this->company = $company;
        $this->department = $department;
        $this->position = $position;
        $this->startDate = $startDate;
        $this->endData = $endData;
        $this->inOffice = $inOffice;
        $this->detail = $detail;
    }

    public function getData(): array
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

    /**
     * @return string
     */
    public function getCompany(): string
    {
        return $this->company;
    }

    /**
     * @return string
     */
    public function getDepartment(): string
    {
        return $this->department;
    }

    /**
     * @return string
     */
    public function getPosition(): string
    {
        return $this->position;
    }

    /**
     * @return string
     */
    public function getStartDate(): string
    {
        return $this->startDate;
    }

    /**
     * @return string|null
     */
    public function getEndData(): ?string
    {
        return $this->endData;
    }

    /**
     * @return bool
     */
    public function isInOffice(): bool
    {
        return $this->inOffice;
    }

    /**
     * @return string
     */
    public function getDetail(): string
    {
        return $this->detail;
    }

}