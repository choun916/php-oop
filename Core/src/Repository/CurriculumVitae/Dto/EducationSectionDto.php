<?php

namespace PhpOop\Core\Repository\CurriculumVitae\Dto;

use PhpOop\Core\Repository\DtoInterface;

class EducationSectionDto extends SectionDtoAbstract implements DtoInterface
{
    private string  $name;
    private string  $major;
    private string  $startDate;
    private ?string $endData;
    private bool    $inAttend;
    private string  $detail;

    /**
     * @param int|null $id
     * @param string $name
     * @param string $major
     * @param string $startDate
     * @param string|null $endData
     * @param bool $inAttend
     * @param string $detail
     */
    public function __construct(?int $id, string $name, string $major, string $startDate, ?string $endData, bool $inAttend, string $detail)
    {
        parent::__construct($id, self::TYPE_EDUCTION);
        $this->name = $name;
        $this->major = $major;
        $this->startDate = $startDate;
        $this->endData = $endData;
        $this->inAttend = $inAttend;
        $this->detail = $detail;
    }

    public function getData(): array
    {
        return [
            'name' => $this->name,
            'major' => $this->major,
            'startDate' => $this->startDate,
            'endData' => $this->endData,
            'inAttend' => $this->inAttend,
            'detail' => $this->detail
        ];
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getMajor(): string
    {
        return $this->major;
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
    public function isInAttend(): bool
    {
        return $this->inAttend;
    }

    /**
     * @return string
     */
    public function getDetail(): string
    {
        return $this->detail;
    }
}