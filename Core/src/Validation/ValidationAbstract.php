<?php declare (strict_types = 1);

namespace PhpOop\Core\Validation;

abstract class ValidationAbstract implements ValidationInterface
{
    protected $data;

    /**
     * @param mixed $data
     * @return mixed
     */
    public function __construct(...$args)
    {
        $this->data = count($args) === 1 ? $args[0] : $args;
    }

    public function passes(): bool
    {
        return true === $this->validated();
    }

    public function fails(): bool
    {
        return false === $this->validated();
    }

    abstract protected function validated(): bool;

}
