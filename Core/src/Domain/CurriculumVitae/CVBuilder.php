<?php

namespace PhpOop\Core\Domain\CurriculumVitae;

use Exception;
use ReflectionClass;
use function PHPUnit\Framework\isNull;

class CVBuilder
{
    private array $sections = [];

    public function __construct()
    {
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

    public function build(): array
    {
        return $this->sections;
    }

}