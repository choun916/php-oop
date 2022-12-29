<?php
declare(strict_types=1);

namespace PhpOop\Core\Util;

interface RequestInfoInterface
{
    public function __construct($request);
    public function urlPath(): string;
    public function get(): array;
    public function post(): array;
    public function stream(): array;
    public function parameters(): array;
}
