<?php declare(strict_types=1);

namespace PhpOop\Core\Application\Repository;

use PhpOop\Core\Repository\ConnectionRepositoryAbstract;

class CodeigniterRepository extends ConnectionRepositoryAbstract
{
    public function readDB()
    {
        return $this->readInstance ?? $this->instance->db;
    }

    public function masterDB()
    {
        return $this->masterInstance ?? $this->instance->load->database('master', true);
    }
}