<?php declare (strict_types = 1);

namespace PhpOop\Core\Repository\Auth\Dto;

class CreateMemberDto
{
    private string $email;
    private string $name;
    private string $password;

    public function __construct(string $email, string $name, string $password)
    {
        $this->email = $email;
        $this->name = $name;
        $this->password = strtoupper(hash("sha256", $password));
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}
