<?php declare (strict_types=1);

namespace PhpOop\Core\Tests\Unit\Service\Auth;

use PhpOop\Core\Exception\WrongEmailException;
use PhpOop\Core\Exception\WrongPasswordException;
use PhpOop\Core\Repository\Auth\MemberRepositoryInterface;
use PhpOop\Core\Service\Auth\MemberService;
use PHPUnit\Framework\TestCase;

final class MemberTest extends TestCase
{
    private MemberService $memberService;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $repository = $this->getMockBuilder(MemberRepositoryInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $repository->method('create')->willReturn(true);
        $this->memberService = new MemberService($repository);
    }

    /**
     * @return array[]
     */
    public function additionProvider(): array
    {
        return [
            '회원 가입 1' => ['email@email.com', 'name_name', 'Abc!@#$1234', true],
        ];
    }

    /**
     * @dataProvider additionProvider
     * @param string $email
     * @param string $name
     * @param string $password
     * @param bool $expected
     * @return void
     * @throws WrongEmailException
     * @throws WrongPasswordException
     */
    public function testJoin(string $email, string $name, string $password, bool $expected): void
    {
        $this->assertSame($expected, $this->memberService->join($email, $name, $password));
    }

    /**
     * @return void
     * @throws WrongEmailException
     * @throws WrongPasswordException
     */
    public function testJoinErrorForWrongEmailException()
    {
        $this->expectException(WrongEmailException::class);
        $this->expectExceptionMessage((new WrongEmailException())->getMessage());
        $this->memberService->join('email@abc', 'name_name', 'Abc!@#$1234');
    }

    /**
     * @return void
     * @throws WrongEmailException
     * @throws WrongPasswordException
     */
    public function testJoinErrorForWrongPasswordException()
    {
        $this->expectException(WrongPasswordException::class);
        $this->expectExceptionMessage((new WrongPasswordException())->getMessage());
        $this->memberService->join('email@abc.com', 'name_name', '<:?/abc');
    }
}