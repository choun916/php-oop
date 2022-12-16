<?php declare (strict_types = 1);

namespace PhpOop\Core\Repository\Auth\Dto;

class LoginMemberDto
{
    private string $email;
    private string $password;

    public function __construct(string $email, string $password)
    {
        $this->email = $email;
        $this->password = strtoupper(hash("sha256", $password));
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}
