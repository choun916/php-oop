<?php

namespace PhpOop\Core\Domain\CurriculumVitae;

use PhpOop\Core\Repository\CurriculumVitae\Dto\SkillSectionDto;

class SkillSection extends CVSectionAbstract
{
    function __construct(
        ?int $id,
        array $list
    ) {
        parent::__construct($id);
        $this->dto = new SkillSectionDto(
            $id,
            $this->type(),
            $list
        );
    }

    public function type(): string
    {
        return self::TYPE_SKILL;
    }

    public function title(): string
    {
        return '기술';
    }
}