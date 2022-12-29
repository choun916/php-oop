<?php
declare(strict_types=1);

namespace PhpOop\Core\Repository;

use stdClass;

abstract class ConnectionRepositoryAbstract implements ConnectionRepositoryInterface
{
    protected $instance;
    protected $readInstance;
    protected $masterInstance;

    public function __construct($instance)
    {
        $this->instance = $instance;
    }
}