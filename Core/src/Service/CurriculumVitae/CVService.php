<?php

namespace PhpOop\Core\Service\CurriculumVitae;

use Exception;
use PhpOop\Core\Domain\CurriculumVitae\CVBuilder;
use PhpOop\Core\Repository\CurriculumVitae\CVRepositoryInterface;
use PhpOop\Core\Repository\CurriculumVitae\Dto\CurriculumVitaeDto;
use PhpOop\Core\Repository\CurriculumVitae\Dto\SectionDtoInterface;
use ReflectionClass;

class CVService implements CVServiceInterface
{
    private CVRepositoryInterface $cvRepository;

    public function __construct(CVRepositoryInterface $cvRepository)
    {
        $this->cvRepository = $cvRepository;
    }

    public function cvBuilder(?int $cvId, string $cvTitle): CVBuilder
    {
        return new CVBuilder($cvId, $cvTitle);
    }

    /**
     * @throws Exception
     */
    public function save(CurriculumVitaeDto $cvDto, SectionDtoInterface ...$sectionDtoList): bool
    {
        try {
            $this->cvRepository->transaction();

            $cvId = $this->cvRepository->updateCurriculumVitae($cvDto);
            foreach ($sectionDtoList as $sectionDto) {
                $this->cvRepository->updateSection($cvId, $sectionDto);
            }

            $this->cvRepository->commit();

        } catch (Exception $e) {
            $this->cvRepository->rollback();
            throw $e;
        }

        return true;
    }

    /**
     * @throws Exception
     */
    public function dtoMapper(string $className, array ...$constructorArgs)
    {
        $dtoList = [];

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
                    throw new Exception('This variable is required: ' . $className . ': ' . $paramName);
                }
                $newArgs[] = $paramValue;
            }

            $dtoList[] = ($reflectionClass->newInstance(...$newArgs));
        }

        return $dtoList;
    }
}