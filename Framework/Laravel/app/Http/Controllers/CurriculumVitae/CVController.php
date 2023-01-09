<?php

namespace App\Http\Controllers\CurriculumVitae;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PhpOop\Core\Repository\CurriculumVitae\Dto\CareerSectionDto;
use PhpOop\Core\Repository\CurriculumVitae\Dto\CurriculumVitaeDto;
use PhpOop\Core\Repository\CurriculumVitae\Dto\EducationSectionDto;
use PhpOop\Core\Repository\CurriculumVitae\Dto\IntroductionSectionDto;
use PhpOop\Core\Repository\CurriculumVitae\Dto\ProfileSectionDto;
use PhpOop\Core\Repository\CurriculumVitae\Dto\SkillSectionDto;
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

            $result = $this->cvService->save(
                ...$this->cvService->dtoMapper(CurriculumVitaeDto::class, ['id' => $cvId, 'title' => $cvTitle]),
                ...$this->cvService->dtoMapper(ProfileSectionDto::class, $profileInput),
                ...$this->cvService->dtoMapper(IntroductionSectionDto::class, $introductionInput),
                ...$this->cvService->dtoMapper(CareerSectionDto::class, ...$careerInput),
                ...$this->cvService->dtoMapper(EducationSectionDto::class, ...$educationInput),
                ...$this->cvService->dtoMapper(SkillSectionDto::class, $skillInput),
            );

            return $result ? response()->success() : response()->error();
        } catch (\Exception $e) {
            return response()->error('Exception: ' . $e->getMessage());
        }

        return response()->error();
    }

}
