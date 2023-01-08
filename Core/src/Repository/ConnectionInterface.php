<?php

namespace PhpOop\Core\Repository;

interface ConnectionInterface
{
    public function __construct();
    public function connection(string $name);
}