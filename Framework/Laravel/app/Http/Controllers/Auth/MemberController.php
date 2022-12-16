<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use App\Models\User;
use Illuminate\Http\Request;
use PhpOop\Core\Service\Auth\MemberService;

class MemberController extends Controller
{
    private MemberService $memberService;

    public function __construct(UserRepository $userRepository)
    {
        $this->memberService = new MemberService($userRepository);
    }

    public function join(Request $request)
    {
        $email = $request->input('email');
        $name = $request->input('name');
        $password = $request->input('password');

        try {
            $result = $this->memberService->join($email, $name, $password);
            return $result === true ? response()->success() : response()->error();
        } catch (\Exception $e) {
            return response()->error($e->getMessage());
        }

        return response()->error();
    }

    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        try {
            $result = $this->memberService->login($email, $password);
            return $result === true ? response()->success() : response()->error();
        } catch (\Exception $e) {
            return response()->error($e->getMessage());
        }

        return response()->error();
    }
}
