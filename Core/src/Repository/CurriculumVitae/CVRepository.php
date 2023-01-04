<?php

namespace PhpOop\Core\Repository\CurriculumVitae;

use Exception;

class CVRepository implements CVRepositoryInterface
{
    /**
     * @throws Exception
     */
    public function insert($cv): bool
    {
        try {
            $this->transaction();
            foreach ($cv as $section)
            {
                $section->getData();
            }

            $this->insert();
            $this->commit();
        } catch (Exception $e ) {
            $this->rollback();
            throw $e;
        }
        return true;
    }

    protected function transaction()
    {
        // TODO: Implement transaction() method.
    }

    protected function commit()
    {
        // TODO: Implement commit() method.
    }

    protected function rollback()
    {
        // TODO: Implement rollback() method.
    }
}