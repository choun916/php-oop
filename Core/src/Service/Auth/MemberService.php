<?php declare (strict_types = 1);

namespace PhpOop\Core\Service\Auth;

use PhpOop\Core\Exception\WrongEmailException;
use PhpOop\Core\Exception\WrongPasswordException;
use PhpOop\Core\Repository\Auth\Dto\CreateMemberDto;
use PhpOop\Core\Repository\Auth\MemberRepositoryInterface;
use PhpOop\Core\Validation\EmailValidation;
use PhpOop\Core\Validation\PasswordValidation;

class MemberService extends AuthServiceAbstract
{
    private MemberRepositoryInterface $memberRepository;

    public function __construct(MemberRepositoryInterface $memberRepository)
    {
        $this->memberRepository = $memberRepository;
    }

    /**
     * @throws WrongEmailException
     * @throws WrongPasswordException
     */
    public function join(string $email, string $name, string $password): bool
    {
        $emailValidation = new EmailValidation($email);
        $passwordValidation = new PasswordValidation($password);

        if ($emailValidation->fails()) {
            throw new WrongEmailException();
        }

        if ($passwordValidation->fails()) {
            throw new WrongPasswordException();
        }

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
