<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use PhpOop\Core\Repository\ConnectionInterface;

class Connection implements ConnectionInterface
{
    private object $instance;

    public function __construct()
    {
        $this->instance = resolve(DB::class);
    }

    public function connection(string $name)
    {
        return $this->instance::connection($name);
    }

    public function beginTransaction()
    {
        $this->instance::beginTransaction();
    }

    public function commit()
    {
        $this->instance::commit();
    }

    public function rollback()
    {
        $this->instance::rollback();
    }
}
