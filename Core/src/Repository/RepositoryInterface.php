<?php
declare(strict_types=1);

namespace PhpOop\Core\Repository;

interface RepositoryInterface
{
    public function __construct(ConnectionInterface $db);
    public function transaction();
    public function commit();
    public function rollback();
}
