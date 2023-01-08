<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use PhpOop\Core\Repository\ConnectionInterface;

class Connection implements ConnectionInterface
{
    private $instance;

    public function __construct()
    {
        $this->instance = resolve(DB::class);
    }

    public function connection(string $name)
    {
        return $this->instance::connection($name);
    }
}
