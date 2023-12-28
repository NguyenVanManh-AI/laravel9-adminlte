<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\RequestLogin;
use App\Http\Requests\Api\RequestUserRegister;
use App\Services\Api\UserService;

class UserController extends Controller
{
    protected UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function register(RequestUserRegister $request)
    {
        return $this->userService->userRegister($request);
    }

    public function login(RequestLogin $request)
    {
        return $this->userService->login($request);
    }

    public function profile()
    {
        return response()->json([
            'message' => 'Xem thông tin cá nhân thành công !',
            'data' => auth('user_api')->user(),
            'status' => 200,
        ], 200);
    }
}
