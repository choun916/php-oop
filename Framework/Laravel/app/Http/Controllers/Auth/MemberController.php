<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Rules\MemberEmail;
use App\Rules\MemberName;
use App\Rules\MemberPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PhpOop\Core\Controller\MemberControllerInterface;
use PhpOop\Core\Service\Auth\MemberService;

class MemberController extends Controller implements MemberControllerInterface
{
    public function __construct(
        private readonly MemberService $memberService
    ) {}

    public function join(Request $request)
    {
        try {
            $validator = Validator::make($request->input(), [
                'email' => ['required', 'email', new MemberEmail],
                'name' => ['required', new MemberName],
                'password' => ['required', new MemberPassword],
            ]);
            $validator->passes() ?: response()->error('validation failed');
            $input = $validator->validated();

            return $this->memberService->join($input['email'], $input['name'], $input['password']) ?
                response()->success() : response()->error();
        } catch (\Exception $e) {
            return response()->error('Exception: '.$e->getMessage());
        }

        return response()->error();
    }

    public function login(Request $request)
    {
        try {
            $validator = Validator::make($request->input(), [
                'email' => ['required', 'email', new MemberEmail],
                'password' => ['required', new MemberPassword],
            ]);

            $validator->passes() ?: response()->error('validation failed');
            $input = $validator->validated();

            return $this->memberService->login($input['email'], $input['password']) ?
                response()->success() : response()->error();
        } catch (\Exception $e) {
            return response()->error('Exception: '.$e->getMessage());
        }

        return response()->error();
    }
}
