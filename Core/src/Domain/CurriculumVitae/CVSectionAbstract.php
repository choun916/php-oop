<?php

namespace PhpOop\Core\Domain\CurriculumVitae;

use PhpOop\Core\Repository\DtoInterface;

abstract class CVSectionAbstract implements CVSectionInterface
{
    protected ?int $id;
    protected DtoInterface $dto;

    public function __construct(?int $id)
    {
        $this->setId($id);
    }

    public function id(): ?int
    {
        return $this->id;
    }

    protected function setId(?int $id) {
        $this->id = $id;
    }

    public function dto(): DtoInterface
    {
        return $this->dto;
    }
}