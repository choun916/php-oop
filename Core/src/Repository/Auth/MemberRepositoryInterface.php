<?php declare (strict_types = 1);

namespace PhpOop\Core\Repository\Auth;

use PhpOop\Core\Repository\Auth\Dto\CreateMemberDto;
use PhpOop\Core\Repository\Auth\Dto\LoginMemberDto;

interface MemberRepositoryInterface
{
    public function create(CreateMemberDto $createMemberDto): bool;
    public function getEmailByLoginDto(LoginMemberDto $loginMemberDto): string;
}
