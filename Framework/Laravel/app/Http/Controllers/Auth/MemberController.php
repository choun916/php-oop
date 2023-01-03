<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Rules\MemberEmail;
use App\Rules\MemberName;
use App\Rules\MemberPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PhpOop\Core\Service\Auth\MemberService;

class MemberController extends Controller
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
            $validator->passes() ?: response()->error($validator->messages());
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

            $validator->passes() ?: response()->error($validator->messages());
            $input = $validator->validated();

            if (! $accessToken = auth()->attempt($input)) {
                return response()->error(['error' => 'Unauthorized'], 401);
            }

            return response()->success([
                'accessToken' => $accessToken,
                'tokenType' => 'bearer',
                'expiresIn' => auth()->factory()->getTTL() * 60
            ]);
        } catch (\Exception $e) {
            return response()->error('Exception: '.$e->getMessage());
        }

        return response()->error();
    }

    public function refresh()
    {
        return response()->success([
            'accessToken' => auth()->refresh(false, true),
            'tokenType' => 'bearer',
            'expiresIn' => auth()->factory()->getTTL() * 60
        ]);
    }

    public function profile()
    {
        auth()->user();
        return response()->success(auth()->user());
    }

    public function logout()
    {
        auth()->logout();
        return response()->success('Successfully logged out');
    }
}
