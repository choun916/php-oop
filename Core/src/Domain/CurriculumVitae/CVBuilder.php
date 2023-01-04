<?php

namespace PhpOop\Core\Domain\CurriculumVitae;

class CVBuilder
{
    private array $sections;
    public function __construct() {}

    public function setSection(CVSectionInterface ...$sections): CVBuilder
    {
        $this->sections = [...$this->sections, ...$sections];
        return $this;
    }

    public function build(): array
    {
        return $this->sections;
    }

}