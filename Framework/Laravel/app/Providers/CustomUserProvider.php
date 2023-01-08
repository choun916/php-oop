<?php

namespace App\Providers;

use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;
use PhpOop\Core\Repository\Auth\PasswordHashTrait;

class CustomUserProvider extends EloquentUserProvider
{
    use PasswordHashTrait;

    public function validateCredentials(UserContract $user, array $credentials): bool
    {
        $hashedPassword = $user->getAuthPassword();
        return $this->passwordVerify($credentials['password'], $hashedPassword);
    }
}
