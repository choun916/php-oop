<?php declare (strict_types = 1);

namespace PhpOop\Core\Service\Auth;

use PhpOop\Core\Repository\Auth\Dto\CreateMemberDto;
use PhpOop\Core\Repository\Auth\MemberRepositoryInterface;

class CompanyService extends AuthServiceAbstract
{
    private MemberRepositoryInterface $memberRepository;

    public function __construct(MemberRepositoryInterface $memberRepository)
    {
        $this->memberRepository = $memberRepository;
    }

    public function join(string $email, string $name, string $password): bool
    {
        $createMemberDTO = new CreateMemberDto($email, $name, $password);
        return $this->memberRepository->create($createMemberDTO);
    }

    public function login(string $email, string $password): bool
    {
        return true;
    }

    public function logout(): bool
    {
        return true;
    }
}
