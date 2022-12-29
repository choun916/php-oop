<?php
declare(strict_types=1);

namespace PhpOop\Core\Repository;

interface ConnectionRepositoryInterface
{
    public function __construct($instance);
    public function readDB();
    public function masterDB();
}
