<?php declare (strict_types=1);

namespace PhpOop\Core\Tests\Unit\Domain\CurriculumVitae;

use Exception;
use PhpOop\Core\Domain\CurriculumVitae\CareerSection;
use PhpOop\Core\Domain\CurriculumVitae\CVBuilder;
use PhpOop\Core\Domain\CurriculumVitae\EducationSection;
use PhpOop\Core\Domain\CurriculumVitae\IntroductionSection;
use PhpOop\Core\Domain\CurriculumVitae\PorfileSection;
use PhpOop\Core\Domain\CurriculumVitae\SkillSection;
use PHPUnit\Framework\TestCase;

final class CVBuilderTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
    }

    public function testProfileSection(): void
    {
        $cvBuilder = new CVBuilder();
        $cvBuilder->setSection(PorfileSection::class, [
            'mobile' => '010-1111-1111',
            'email' => 'abcd@email.com',
            'name' => '사용자이름1',
        ]);

        $cv = $cvBuilder->build();

        $this->assertCount(1, $cv);

        $this->assertSame([
            'name' => '사용자이름1',
            'email' => 'abcd@email.com',
            'mobile' => '010-1111-1111'
        ], $cv[0]->contents());

    }

    public function testIntroductionSection(): void
    {
        $cvBuilder = new CVBuilder();
        $cvBuilder->setSection(IntroductionSection::class, [
            'contents' =>
                '백엔드 개발자입니다. ' .
                '업무를 진행하면서 필요한 기술을 습득하는 것에 적극적으로 임하고, ' .
                '다양한 기술을 경험하는 것에 흥미를 느끼며 학습하는 것을 좋아합니다.'
        ]);

        $cv = $cvBuilder->build();

        $this->assertCount(1, $cv);

        $this->assertSame([
            'contents' => '백엔드 개발자입니다. ' .
                '업무를 진행하면서 필요한 기술을 습득하는 것에 적극적으로 임하고, ' .
                '다양한 기술을 경험하는 것에 흥미를 느끼며 학습하는 것을 좋아합니다.'
        ], $cv[0]->contents());
    }

    public function testCareerSection(): void
    {
        $careerInput = [
            [
                'company' => '회사A',
                'department' => '개발팀A',
                'position' => '팀원A',
                'startDate' => '2017-05',
                'endData' => '2017-10',
                'inOffice' => false,
                'detail' => '개발A 업무 내용 개발 업무 내용',
            ], [
                'company' => '회사B',
                'department' => '개발팀B',
                'position' => '팀원B',
                'startDate' => '2018-05',
                'endData' => '2020-10',
                'inOffice' => false,
                'detail' => '개발B 업무 내용 개발 업무 내용',
            ], [
                'company' => '회사C',
                'department' => '개발팀C',
                'position' => '팀원C',
                'startDate' => '2020-11',
                'endData' => null,
                'inOffice' => true,
                'detail' => '개발C 업무 내용 개발 업무 내용',
            ]
        ];
        $cvBuilder = new CVBuilder();
        $cvBuilder->setSection(CareerSection::class, ...$careerInput);

        $cv = $cvBuilder->build();

        $this->assertCount(3, $cv);

        $this->assertSame([
            'company' => '회사A',
            'department' => '개발팀A',
            'position' => '팀원A',
            'startDate' => '2017-05',
            'endData' => '2017-10',
            'inOffice' => false,
            'detail' => '개발A 업무 내용 개발 업무 내용'
        ], $cv[0]->contents());

        $this->assertSame([
            'company' => '회사B',
            'department' => '개발팀B',
            'position' => '팀원B',
            'startDate' => '2018-05',
            'endData' => '2020-10',
            'inOffice' => false,
            'detail' => '개발B 업무 내용 개발 업무 내용'
        ], $cv[1]->contents());

        $this->assertSame([
            'company' => '회사C',
            'department' => '개발팀C',
            'position' => '팀원C',
            'startDate' => '2020-11',
            'endData' => null,
            'inOffice' => true,
            'detail' => '개발C 업무 내용 개발 업무 내용'
        ], $cv[2]->contents());
    }

    public function testEducationSection(): void
    {
        $cvBuilder = new CVBuilder();
        $cvBuilder->setSection(EducationSection::class, [
            'name' => '학교',
            'major' => '학과',
            'startDate' => '2018-03',
            'endData' => '2020-02',
            'inAttend' => false,
            'detail' => '내용',
        ]);

        $cv = $cvBuilder->build();

        $this->assertCount(1, $cv);

        $this->assertSame([
            'name' => '학교',
            'major' => '학과',
            'startDate' => '2018-03',
            'endData' => '2020-02',
            'inAttend' => false,
            'detail' => '내용',
        ], $cv[0]->contents());
    }

    public function testSkillSection(): void
    {
        $cvBuilder = new CVBuilder();
        $cvBuilder->setSection(SkillSection::class, [
            'list' => ['Python', 'Go', 'Dart', 'Kotlin', 'Swift']
        ]);

        $cv = $cvBuilder->build();

        $this->assertCount(1, $cv);

        $this->assertSame([
            'list' => ['Python', 'Go', 'Dart', 'Kotlin', 'Swift']
        ], $cv[0]->contents());
    }
}