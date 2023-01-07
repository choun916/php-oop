<?php

namespace PhpOop\Core\Domain\CurriculumVitae;

class PorfileSection extends CVSectionAbstract
{
    private string $name;
    private string $email;
    private string $mobile;

    function __construct(
        ?int $id,
        string $name,
        string $email,
        string $mobile
    )
    {
        parent::__construct($id);
        $this->name = $name;
        $this->email = $email;
        $this->mobile = $mobile;
    }

    public function type(): string
    {
        return self::TYPE_PROFILE;
    }

    public function title(): string
    {
        return '인적사항';
    }

    public function contents(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'mobile' => $this->mobile
        ];
    }
}