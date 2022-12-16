<?php declare (strict_types = 1);

namespace PhpOop\Core\Exception;

class WrongPasswordException extends \Exception
{
    protected $message = '영문, 숫자, 특수문자(!@#$%^&*()_+-=)만 입력 가능하며, 8~25자리를 입력해주세요.';
}