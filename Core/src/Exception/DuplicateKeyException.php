<?php declare (strict_types = 1);

namespace PhpOop\Core\Exception;

class DuplicateKeyException extends \Exception
{
    protected $message = 'Duplicate Key Error';
}