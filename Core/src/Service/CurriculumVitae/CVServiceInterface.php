<?php

namespace PhpOop\Core\Service\CurriculumVitae;

use PhpOop\Core\Domain\CurriculumVitae\CVListInterface;

interface CVServiceInterface
{
    public function __construct(CVListInterface $cvList);
    public function save():bool;
}