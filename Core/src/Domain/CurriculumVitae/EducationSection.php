<?php

namespace PhpOop\Core\Domain\CurriculumVitae;

class EducationSection extends CVSectionAbstract
{
    private string $name;
    private string $major;
    private string $startDate;
    private ?string $endData;
    private bool $inAttend;
    private string $detail;

    function __construct(
        ?int $id,
        string $name,
        string $major,
        string $startDate,
        ?string $endData,
        bool $inAttend,
        string $detail
    ) {
        parent::__construct($id);
        $this->name = $name;
        $this->major = $major;
        $this->startDate = $startDate;
        $this->endData = $endData;
        $this->inAttend = $inAttend;
        $this->detail = $detail;
    }

    public function type(): string
    {
        return self::TYPE_EDUCTION;
    }

    public function title(): string
    {
        return '학력';
    }

    public function contents(): array
    {
        return [
            'name' => $this->name,
            'major' => $this->major,
            'startDate' => $this->startDate,
            'endData' => $this->endData,
            'inAttend' => $this->inAttend,
            'detail' => $this->detail,
        ];
    }
}