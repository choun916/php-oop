<?php

namespace PhpOop\Core\Domain\CurriculumVitae;

use Exception;
use ReflectionClass;

class CVBuilder
{
    private ?int $cvId;
    private string $cvTitle;
    private array $sections = [];

    public function __construct(?int $cvId, string $cvTitle)
    {
        $this->cvId = $cvId;
        $this->cvTitle = $cvTitle;
    }

    /**
     * @throws Exception
     */
    public function setSection(string $className, array ...$constructorArgs): CVBuilder
    {
        if (!class_exists($className)) {
            throw new Exception('class name does not exist: ' . $className);
        }

        $reflectionClass = new ReflectionClass($className);

        foreach ($constructorArgs as $inputArgs) {

            $newArgs = [];
            $parameters = $reflectionClass->getConstructor()->getParameters();
            foreach ($parameters as $param) {
                $paramName = $param->name;
                $paramValue = $inputArgs[$paramName] ?? null;

                if (!$param->allowsNull() && is_null($paramValue)) {
                    throw new Exception('This variable is required: ' . $paramName);
                }
                $newArgs[] = $paramValue;
            }

            $this->append($reflectionClass->newInstance(...$newArgs));
        }

        return $this;
    }

    private function append(CVSectionInterface $section): void
    {
        $this->sections = [...$this->sections, $section];
    }

    public function build(): CV
    {
        $cv = new CV($this->cvId, ...$this->sections);
        $this->reset();
        return $cv;
    }

    private function reset(): void
    {
        $this->cvId = null;
        $this->sections = [];
    }

}