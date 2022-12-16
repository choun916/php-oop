<?php declare (strict_types = 1);

namespace PhpOop\Core\Repository\Auth;

use PhpOop\Core\Repository\Auth\Dto\CreateMemberDto;

interface MemberRepositoryInterface
{
    public function __construct();
    public function create(CreateMemberDto $createMemberDto): bool;
}
