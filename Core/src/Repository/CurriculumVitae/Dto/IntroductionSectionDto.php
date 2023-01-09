<?php

namespace PhpOop\Core\Repository\CurriculumVitae\Dto;

use PhpOop\Core\Repository\DtoInterface;

class IntroductionSectionDto extends SectionDtoAbstract implements DtoInterface
{
    private string $contents;

    /**
     * @param int|null $id
     * @param string $contents
     */
    public function __construct(?int $id, string $contents)
    {
        parent::__construct($id, self::TYPE_INTRODUCTION);
        $this->contents = $contents;
    }

    public function getData(): array
    {
        return [
            'contents' => $this->contents
        ];
    }

    /**
     * @return string
     */
    public function getContents(): string
    {
        return $this->contents;
    }
}