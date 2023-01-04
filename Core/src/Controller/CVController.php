<?php

namespace PhpOop\Core\Controller;

use PhpOop\Core\Domain\CurriculumVitae\CareerSection;
use PhpOop\Core\Domain\CurriculumVitae\IntroductionSection;
use PhpOop\Core\Domain\CurriculumVitae\PorfileSection;
use PhpOop\Core\Service\CurriculumVitae\CVService;

class CVController
{
    public function __construct()
    {
    }

    public function create()
    {
        $cvRepository = new CVRepository();
        $cvService = new CVService($cvRepository);

        $cvBuilder = $cvService->cvBuilder();

        $cvBuilder->setSection(new PorfileSection([
            'name' => '사용자이름',
            'email' => 'abcd@email.com',
            'mobile' => '010-1111-1111'
        ]));

        $cvBuilder->setSection(new IntroductionSection(
            '백엔드 개발자입니다. ' .
            '업무를 진행하면서 필요한 기술을 습득하는 것에 적극적으로 임하고, ' .
            '다양한 기술을 경험하는 것에 흥미를 느끼며 학습하는 것을 좋아합니'
        ));

        $cvBuilder->setSection(
            new CareerSection([
                '회사A', '개발팀', '팀원', '2017-05', '2022-10', false,
                '개발 업무 내용 개발 업무 내용 개발 업무 내용 개발 업무 내용 개발 업무 내용'
            ]),
            new CareerSection([
                '회사A', '개발팀', '팀원', '2017-05', '2022-10', false,
                '개발 업무 내용 개발 업무 내용 개발 업무 내용 개발 업무 내용 개발 업무 내용'
            ]),
            new CareerSection([
                '회사A', '개발팀', '팀원', '2017-05', '2022-10', false,
                '개발 업무 내용 개발 업무 내용 개발 업무 내용 개발 업무 내용 개발 업무 내용'
            ])
        );

        //TODO: Education
        //TODO: Skill

        return $cvService->save($cvBuilder->build());
    }

}