<?php declare(strict_types=1);

namespace PhpOop\Core\Application\Repository;

use App\Repositories\RepositoryAbstract;

class CodeigniterRepository extends RepositoryAbstract
{
    public function readDB()
    {
        return $this->readDB ?? $this->instance->db;
    }

    public function writeDB()
    {
        return $this->writeDB ?? $this->instance->load->database('master', true);
    }
}