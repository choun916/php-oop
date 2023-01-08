<?php
declare(strict_types=1);

namespace App\Repositories;

use PhpOop\Core\Repository\ConnectionInterface;
use PhpOop\Core\Repository\RepositoryInterface;

abstract class RepositoryAbstract implements RepositoryInterface
{
    protected object $db;
    private object $readDB;
    private object $writeDB;

    public function __construct(ConnectionInterface $db)
    {
        $this->db = $db;
        $this->readDB = $db->connection('mysql::read');
        $this->writeDB = $db->connection('mysql::write');
    }

    protected function readDB(): object
    {
        return $this->readDB;
    }

    protected function writeDB(): object
    {
        return $this->writeDB;
    }

    public function transaction()
    {
        $this->db::beginTransaction();
    }

    public function commit()
    {
        $this->db::commit();
    }

    public function rollback()
    {
        $this->db::rollback();
    }
}
