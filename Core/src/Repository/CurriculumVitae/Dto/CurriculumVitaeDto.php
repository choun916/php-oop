<?php

namespace PhpOop\Core\Repository\CurriculumVitae\Dto;

use PhpOop\Core\Repository\DtoInterface;

class CurriculumVitaeDto implements DtoInterface
{
    private ?int $id;
    private ?int $title;
    // TODO: private string visibility

    public function __construct(?int $id, string $title)
    {
        $this->id = $id;
        $this->title = $title;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    // TODO: public function visibility
}