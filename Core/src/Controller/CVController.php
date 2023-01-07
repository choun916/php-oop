<?php

namespace PhpOop\Core\Controller;

use PhpOop\Core\Domain\CurriculumVitae\CareerSection;
use PhpOop\Core\Domain\CurriculumVitae\EducationSection;
use PhpOop\Core\Domain\CurriculumVitae\IntroductionSection;
use PhpOop\Core\Domain\CurriculumVitae\PorfileSection;
use PhpOop\Core\Domain\CurriculumVitae\SkillSection;
use PhpOop\Core\Service\CurriculumVitae\CVService;

class CVController
{
    public function __construct()
    {
    }

    public function create()
    {
        $profileInput = [
            'name' => '사용자이름',
            'email' => 'abcd@email.com',
            'mobile' => '010-1111-1111'
        ];

        $introductionInput = [
            'contents' =>
                '백엔드 개발자입니다. ' .
                '업무를 진행하면서 필요한 기술을 습득하는 것에 적극적으로 임하고, ' .
                '다양한 기술을 경험하는 것에 흥미를 느끼며 학습하는 것을 좋아합니다.'
        ];

        $careerInput1 = ['회사A', '개발팀', '팀원', '2017-05', '2022-10', false,
            '개발 업무 내용 개발 업무 내용 개발 업무 내용 개발 업무 내용 개발 업무 내용'];
        $careerInput2 = ['회사B', '개발팀', '팀원', '2017-05', '2022-10', false,
            '개발 업무 내용 개발 업무 내용 개발 업무 내용 개발 업무 내용 개발 업무 내용'];
        $careerInput3 = ['회사C', '개발팀', '팀원', '2017-05', '2022-10', false,
            '개발 업무 내용 개발 업무 내용 개발 업무 내용 개발 업무 내용 개발 업무 내용'];

        $educationInput = [
            'name' => '학교',
            'major' => '학과',
            'startDate' => '2018-03',
            'endData' => '2020-02',
            'inAttend' => false,
            'detail' => '내용',
        ];

        $skillInput = [
            'list' => ['Python', 'Go', 'Dart', 'Kotlin', 'Swift']
        ];

        $cvRepository = new CVRepository();
        $cvService = new CVService($cvRepository);

        $cvBuilder = $cvService->cvBuilder();

        $cvBuilder->setSection(PorfileSection::class, $profileInput);
        $cvBuilder->setSection(IntroductionSection::class, $introductionInput);
        $cvBuilder->setSection(CareerSection::class, $careerInput1, $careerInput2, $careerInput3);
        $cvBuilder->setSection(EducationSection::class, $educationInput);
        $cvBuilder->setSection(SkillSection::class, $skillInput);

        return $cvService->save($cvBuilder->build());
    }

}