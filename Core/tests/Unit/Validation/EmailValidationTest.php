<?php declare (strict_types=1);

namespace PhpOop\Core\Tests\Unit\Validation;

use PHPUnit\Framework\TestCase;
use PhpOop\Core\Validation\EmailValidation;

final class EmailValidationTest extends TestCase
{
    /**
     * @return array[]
     */
    public function additionProvider(): array
    {
        return [
            '이메일 검증 1' => ['abc@email.com', true],
            '이메일 검증 2' => ['123.abc@email.com', true],
            '이메일 검증 3' => ['abc@email', false],
            '이메일 검증 4' => ['abc.email.com', false],
            '이메일 검증 5' => ['', false]
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
        $emailValidation = new EmailValidation($email);
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
        $emailValidation = new EmailValidation($email);
        $this->assertSame(!$expected, $emailValidation->fails());
    }
}