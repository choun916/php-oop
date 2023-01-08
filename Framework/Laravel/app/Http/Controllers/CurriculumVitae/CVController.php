<?php

namespace App\Http\Controllers\CurriculumVitae;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PhpOop\Core\Domain\CurriculumVitae\CareerSection;
use PhpOop\Core\Domain\CurriculumVitae\EducationSection;
use PhpOop\Core\Domain\CurriculumVitae\IntroductionSection;
use PhpOop\Core\Domain\CurriculumVitae\PorfileSection;
use PhpOop\Core\Domain\CurriculumVitae\SkillSection;
use PhpOop\Core\Service\CurriculumVitae\CVService;

class CVController extends Controller
{
    public function __construct(
        private readonly CVService $cvService
    )
    {
    }

    public function save(Request $request, int $cvId = null)
    {
        try {
            $validator = Validator::make($request->input(), [
                'title' => ['required'],
                'profile.name' => ['required'],
                'profile.email' => ['required'],
                'profile.mobile' => ['required'],
                'introduction.contents' => ['required'],
                'career.*.company' => ['required'],
                'career.*.department' => ['required'],
                'career.*.position' => ['required'],
                'career.*.startDate' => ['required'],
                'career.*.endData' => ['required'],
                'career.*.inOffice' => ['required'],
                'career.*.detail' => ['required'],
                'education.*.name' => ['required'],
                'education.*.major' => ['required'],
                'education.*.startDate' => ['required'],
                'education.*.endData' => ['required'],
                'education.*.inAttend' => ['required'],
                'education.*.detail' => ['required'],
                'skill.list' => ['required'],
            ]);
            $validator->passes() ?: response()->error($validator->messages());
            $input = $validator->validated();

            [
                'title' => $cvTitle,
                'profile' => $profileInput,
                'introduction' => $introductionInput,
                'career' => $careerInput,
                'education' => $educationInput,
                'skill' => $skillInput,
            ] = $input;

            $cvBuilder = $this->cvService->cvBuilder($cvId, $cvTitle);
            $cvBuilder->setSection(PorfileSection::class, $profileInput);
            $cvBuilder->setSection(IntroductionSection::class, $introductionInput);
            $cvBuilder->setSection(CareerSection::class, ...$careerInput);
            $cvBuilder->setSection(EducationSection::class, ...$educationInput);
            $cvBuilder->setSection(SkillSection::class, $skillInput);

            return $this->cvService->save($cvBuilder->build()) ? response()->success() : response()->error();
        } catch (\Exception $e) {
            return response()->error('Exception: ' . $e->getMessage());
        }

        return response()->error();
    }

}
