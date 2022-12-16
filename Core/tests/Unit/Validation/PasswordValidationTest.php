<?php declare (strict_types=1);

namespace PhpOop\Core\Tests\Unit\Validation;

use PHPUnit\Framework\TestCase;
use PhpOop\Core\Validation\PasswordValidation;

final class PasswordValidationTest extends TestCase
{
    /**
     * @return array[]
     */
    public function additionProvider(): array
    {
        return [
            '비밀번호 검증 1' => ['Abc1234!@#$', true],
            '비밀번호 검증 2' => ['1234', false],
            '비밀번호 검증 3' => ['a b c d', false],
            '비밀번호 검증 4' => ['1234567', false],
            '비밀번호 검증 5' => ['12345678', true],
            '비밀번호 검증 6' => ['', false]
        ];
    }

    /**
     * @dataProvider additionProvider
     * @param string $email
     * @param bool $expected
     * @return void
     */
    public function testPasses(string $email, bool $expected): void
    {
        $emailValidation = new PasswordValidation($email);
        $this->assertSame($expected, $emailValidation->passes());
    }

    /**
     * @dataProvider additionProvider
     * @param string $email
     * @param bool $expected
     * @return void
     */
    public function testFails(string $email, bool $expected): void
    {
        $emailValidation = new PasswordValidation($email);
        $this->assertSame(!$expected, $emailValidation->fails());
    }
}