<?php

namespace PhpOop\Core\Repository\CurriculumVitae\Dto;

use PhpOop\Core\Repository\DtoInterface;

class ProfileSectionDto extends SectionDtoAbstract implements DtoInterface
{
    private string $name;
    private string $email;
    private string $mobile;

    /**
     * @param int|null $id
     * @param string $name
     * @param string $email
     * @param string $mobile
     */
    public function __construct(?int $id, string $name, string $email, string $mobile)
    {
        parent::__construct($id, self::TYPE_PROFILE);
        $this->name = $name;
        $this->email = $email;
        $this->mobile = $mobile;
    }

    public function getData(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'mobile' => $this->mobile
        ];
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getMobile(): string
    {
        return $this->mobile;
    }

}