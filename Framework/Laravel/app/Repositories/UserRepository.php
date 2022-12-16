<?php
namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use PhpOop\Core\Repository\Auth\Dto\CreateMemberDto;
use PhpOop\Core\Repository\Auth\Dto\LoginMemberDto;
use PhpOop\Core\Repository\Auth\MemberRepositoryInterface;

class UserRepository implements MemberRepositoryInterface
{
    public function create(CreateMemberDto $createMemberDto): bool
    {
        $id = DB::table('members')->insertGetId([
            'email' => $createMemberDto->getEmail(),
            'name' => $createMemberDto->getName(),
            'password' => $createMemberDto->getPassword(),
        ]);

        return $id > 0;
    }

    public function getEmailByLoginDto(LoginMemberDto $loginMemberDto): string
    {
        $email = DB::table('members')
            ->where('email', $loginMemberDto->getEmail())
            ->where('password', $loginMemberDto->getPassword())
            ->avg('email');

        return $email ?? '';
    }
}
