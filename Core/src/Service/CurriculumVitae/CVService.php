<?php

namespace PhpOop\Core\Service\CurriculumVitae;

use PhpOop\Core\Domain\CurriculumVitae\CVListInterface;

class CVService implements CVServiceInterface
{
    public function __construct(CVListInterface $cvList)
    {
    }

    public function save(): bool
    {
        // TODO: Implement save() method.
        return true;
    }
}