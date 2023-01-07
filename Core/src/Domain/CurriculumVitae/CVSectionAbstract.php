<?php

namespace PhpOop\Core\Domain\CurriculumVitae;

abstract class CVSectionAbstract implements CVSectionInterface
{
    protected ?int $id;

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
}