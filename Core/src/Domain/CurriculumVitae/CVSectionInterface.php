<?php

namespace PhpOop\Core\Domain\CurriculumVitae;

interface CVSectionInterface
{
    public const TYPE_PROFILE = 'profile';
    public const TYPE_INTRODUCTION = 'introduction';
    public const TYPE_CAREER = 'career';
    public const TYPE_EDUCTION = 'education';
    public const TYPE_SKILL = 'skill';

}