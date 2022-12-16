<?php declare (strict_types = 1);

namespace PhpOop\Core\Service\Auth;

use PhpOop\Core\Repository\Auth\MemberRepositoryInterface;

interface AuthServiceInterface
{
    public function __construct(MemberRepositoryInterface $memberRepository);
    public function join(string $email, string $name, string $password): bool;
    public function login(string $email, string $password): bool;
    public function logout(): bool;
}
