<?php declare (strict_types = 1);

namespace PhpOop\Core\Validation;

class EmailValidation extends ValidationAbstract
{
    protected function validated(): bool
    {
        $pattern = "/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i";
        return (bool) preg_match($pattern, $this->data);
    }
    /**
     * @return string
     */
    public function errorMessage(): string
    {
        return '이메일 형식이 아닙니다.';
    }
}
