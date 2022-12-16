<?php declare (strict_types = 1);

namespace PhpOop\Core\Exception;

class WrongEmailException extends \Exception
{
    protected $message = '이메일 형식이 아닙니다.';
}