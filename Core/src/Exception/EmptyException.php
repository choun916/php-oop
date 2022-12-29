<?php declare(strict_types=1);

namespace PhpOop\Core\Exception;

class EmptyException extends \Exception {
    protected $message = 'Data is Empty';
}