<?php declare (strict_types = 1);

namespace PhpOop\Core\Validation;

interface ValidationInterface
{
    public function __construct(...$args);
    public function passes(): bool;
    public function fails(): bool;
    public function errorMessage(): string;
}
