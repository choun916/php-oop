<?php

namespace PhpOop\Core\Domain\CurriculumVitae;

class IntroductionSection extends CVSectionAbstract
{
    private string $contents;

    function __construct(?int $id, string $contents)
    {
        parent::__construct($id);
        $this->contents = $contents;
    }

    public function type(): string
    {
        return self::TYPE_INTRODUCTION;
    }

    public function title(): string
    {
        return '자기소개';
    }

    public function contents(): array
    {
        return [
            'contents' => $this->contents
        ];
    }
}