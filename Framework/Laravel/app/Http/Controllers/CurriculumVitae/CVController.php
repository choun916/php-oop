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
    ) {}

    public function create(Request $request)
    {
        try {
            $validator = Validator::make($request->input(), [
                // TODO: 검증 작성
            ]);
            $validator->passes() ?: response()->error($validator->messages());
            $input = $validator->validated();

            [
                'profileInput' => $profileInput,
                'introductionInput' => $introductionInput,
                'careerInput' => $careerInput,
                'educationInput' => $educationInput,
                'skillInput' => $skillInput,
            ] = $input;

            $cvBuilder = $this->cvService->cvBuilder();
            $cvBuilder->setSection(PorfileSection::class, $profileInput);
            $cvBuilder->setSection(IntroductionSection::class, $introductionInput);
            $cvBuilder->setSection(CareerSection::class, ...$careerInput);
            $cvBuilder->setSection(EducationSection::class, $educationInput);
            $cvBuilder->setSection(SkillSection::class, $skillInput);


            return $this->cvService->save($cvBuilder->build()) ?
                response()->success() : response()->error();
        } catch (\Exception $e) {
            return response()->error('Exception: '.$e->getMessage());
        }

        return response()->error();
    }

}
