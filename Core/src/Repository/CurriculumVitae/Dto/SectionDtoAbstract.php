<?php

namespace PhpOop\Core\Repository\CurriculumVitae\Dto;

abstract class SectionDtoAbstract implements SectionDtoInterface
{
    private ?int $id;
    private string $type;

    /**
     * @param int|null $id
     * @param string $type
     */
    public function __construct(?int $id, string $type)
    {
        $this->id = $id;
        $this->type = $type;
    }


    public function GetId(): ?int
    {
        return $this->id;
    }

    public function GetType(): string
    {
        return $this->type;
    }

    abstract public function getData(): array;
}