<?php

namespace PhpOop\Core\Domain\CurriculumVitae;

use PhpOop\Core\Repository\CurriculumVitae\Dto\ProfileSectionDto;

class ProfileSection extends CVSectionAbstract
{
    function __construct(
        ?int   $id,
        string $name,
        string $email,
        string $mobile
    )
    {
        parent::__construct($id);
        $this->dto = new ProfileSectionDto(
            $id,
            $this->type(),
            $name,
            $email,
            $mobile
        );
    }

    public function type(): string
    {
        return self::TYPE_PROFILE;
    }

    public function title(): string
    {
        return '인적사항';
    }
}