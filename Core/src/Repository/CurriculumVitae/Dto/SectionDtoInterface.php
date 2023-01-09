<?php

namespace PhpOop\Core\Repository\CurriculumVitae\Dto;

interface SectionDtoInterface
{
    public const TYPE_PROFILE = 'profile';
    public const TYPE_INTRODUCTION = 'introduction';
    public const TYPE_CAREER = 'career';
    public const TYPE_EDUCTION = 'education';
    public const TYPE_SKILL = 'skill';

    public function getId(): ?int;
    public function getType(): string;
    public function getData(): array;
}