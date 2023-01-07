<?php

namespace PhpOop\Core\Domain\CurriculumVitae;

class SkillSection extends CVSectionAbstract
{
    private array $list;

    function __construct(
        ?int $id,
        array $list
    ) {
        parent::__construct($id);
        $this->list = $list;
    }

    public function type(): string
    {
        return self::TYPE_EDUCTION;
    }

    public function title(): string
    {
        return '기술';
    }

    public function contents(): array
    {
        return [
            'list' => $this->list
        ];
    }
}