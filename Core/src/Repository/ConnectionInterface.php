<?php

namespace PhpOop\Core\Repository;

interface ConnectionInterface
{
    public function __construct();
    public function connection(string $name);
    public function beginTransaction();
    public function commit();
    public function rollback();
}