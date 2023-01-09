<?php

namespace PhpOop\Core\Repository\CurriculumVitae\Dto;

use PhpOop\Core\Repository\DtoInterface;

class SkillSectionDto extends SectionDtoAbstract implements DtoInterface
{
    private array $list;

    /**
     * @param int|null $id
     * @param array $list
     */
    public function __construct(?int $id, array $list)
    {
        parent::__construct($id, self::TYPE_SKILL);
        $this->list = $list;
    }

    public function getData(): array
    {
        return [
            'list' => $this->list
        ];
    }

    /**
     * @return array
     */
    public function getList(): array
    {
        return $this->list;
    }
}