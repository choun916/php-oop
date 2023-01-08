<?php

namespace PhpOop\Core\Repository\Auth;

trait PasswordHashTrait
{
    protected function passwordHash(string $plainText, string $salt=null): string
    {
        $iterations = 10;
        $salt ??= bin2hex(random_bytes(32));
        $hashed = bin2hex(hash_pbkdf2("sha256", $plainText, $salt, $iterations, 32, true));
        return $hashed.'.'.$salt;
    }

    protected function passwordVerify(string $plainText, string $hashedText): bool
    {
        $salt = explode('.', $hashedText)[1] ?? '';
        return $this->passwordHash($plainText, $salt) === $hashedText;
    }
}