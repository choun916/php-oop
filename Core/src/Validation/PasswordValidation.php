<?php declare (strict_types = 1);

namespace PhpOop\Core\Validation;

class PasswordValidation extends ValidationAbstract
{
    protected function validated(): bool
    {
        return (bool) preg_match('/^.{8,25}$/i', $this->data)
        && (bool) preg_match('/^[a-z0-9!@#$%^&*()_+-=]*$/i', $this->data);
    }

    /**
     * @return string
     */
    public function errorMessage(): string
    {
        return '영문, 숫자, 특수문자(!@#$%^&*()_+-=)만 입력 가능하며, 8~25자리를 입력해주세요.';
    }
}
