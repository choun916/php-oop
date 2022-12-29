<?php declare(strict_types=1);

namespace PhpOop\Core\Application\Repository;

use PhpOop\Core\Repository\ConnectionRepositoryAbstract;

class LaravelRepository extends ConnectionRepositoryAbstract
{
    public function readDB()
    {
        return $this->readInstance ?? $this->instance;
    }

    public function masterDB()
    {
        return $this->masterInstance ?? $this->instance::connection('mysql::write');
    }
}