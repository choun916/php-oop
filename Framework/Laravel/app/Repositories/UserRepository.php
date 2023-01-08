<?php
namespace App\Repositories;

use PhpOop\Core\Repository\Auth\Dto\CreateMemberDto;
use PhpOop\Core\Repository\Auth\Dto\LoginMemberDto;
use PhpOop\Core\Repository\Auth\MemberRepositoryInterface;

class UserRepository extends RepositoryAbstract implements MemberRepositoryInterface
{
    public function create(CreateMemberDto $createMemberDto): bool
    {
        $id = $this->writeDB()->table('members')->insertGetId([
            'email' => $createMemberDto->getEmail(),
            'name' => $createMemberDto->getName(),
            'password' => $createMemberDto->getPassword(),
        ]);

        return $id > 0;
    }

    public function getEmailByLoginDto(LoginMemberDto $loginMemberDto): string
    {
        $email = $this->readDB()->table('members')
            ->where('email', $loginMemberDto->getEmail())
            ->where('password', $loginMemberDto->getPassword())
            ->value('email');

        return $email ?? '';
    }
}
