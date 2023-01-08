<?php declare (strict_types = 1);

namespace PhpOop\Core\Repository\Auth\Dto;

use PhpOop\Core\Repository\Auth\PasswordHashTrait;
use PhpOop\Core\Repository\DtoInterface;

class LoginMemberDto implements DtoInterface
{
    use PasswordHashTrait;

    private string $email;
    private string $password;

    public function __construct(string $email, string $password)
    {
        $this->email = $email;
        $this->password = $this->passwordHash($password);
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
