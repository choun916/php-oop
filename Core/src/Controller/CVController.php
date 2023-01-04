<?php

namespace PhpOop\Core\Controller;

use Mockery\Exception;
use PhpOop\Core\Domain\CurriculumVitae\CVList;
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
        $profileSection = new PorfileSection([
            'name' => '사용자이름',
            'email' => 'abcd@email.com',
            'mobile' => '010-1111-1111'
        ]);

        $introductionSection = new IntroductionSection('백엔드 개발자입니다. ' .
            '업무를 진행하면서 필요한 기술을 습득하는 것에 적극적으로 임하고, ' .
            '다양한 기술을 경험하는 것에 흥미를 느끼며 학습하는 것을 좋아합니');

        //TODO: Career
        //TODO: Education
        //TODO: Skills

        $cvList = new CVList($profileSection, $introductionSection);
        $cvService = new CVService($cvList);

        return $cvService->save();
    }

}