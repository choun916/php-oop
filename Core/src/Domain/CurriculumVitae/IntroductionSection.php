<?php

namespace PhpOop\Core\Domain\CurriculumVitae;

use PhpOop\Core\Repository\CurriculumVitae\Dto\IntroductionSectionDto;

class IntroductionSection extends CVSectionAbstract
{
    function __construct(?int $id, string $contents)
    {
        parent::__construct($id);
        $this->dto = new IntroductionSectionDto(
            $id,
            $this->type(),
            $contents
        );
    }

    public function type(): string
    {
        return self::TYPE_INTRODUCTION;
    }

    public function title(): string
    {
        return '자기소개';
    }
}