<?php

namespace App\Services\Api;

use App\Http\Requests\Api\RequestLogin;
use App\Http\Requests\Api\RequestUserRegister;
use App\Models\User;
use App\Repositories\UserInterface;
use Illuminate\Support\Facades\Hash;
use Throwable;

class UserService
{
    protected UserInterface $userRepository;

    public function __construct(
        UserInterface $userRepository,
    ) {
        $this->userRepository = $userRepository;
    }

    public function responseOK($status = 200, $data = null, $message = '')
    {
        return response()->json([
            'message' => $message,
            'data' => $data,
            'status' => $status,
        ], $status);
    }

    public function responseError($status = 400, $message = '')
    {
        return response()->json([
            'message' => $message,
            'status' => $status,
        ], $status);
    }

    public function saveAvatar(object $filter)
    {
        try {
            if ($filter->avatar) {
                $avatar = $filter->avatar;
                $filename = pathinfo($avatar->getClientOriginalName(), PATHINFO_FILENAME) . '_' . time() . '.' . $avatar->getClientOriginalExtension();
                $avatar->storeAs('public/image/avatars/users/', $filename);

                return 'storage/image/avatars/users/' . $filename;
            }
        } catch (\Exception $e) {
        }
    }

    public function userRegister(RequestUserRegister $request)
    {
        try {
            $filter = (object) [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'avatar' => $request->avatar,
                'role' => 'user',
            ];
            $userEmail = $this->userRepository->findUserbyEmail($request->email);
            if ($userEmail) {
                return $this->responseError(400, 'Tài khoản đã tồn tại !');
            } else {
                $filter->avatar = $this->saveAvatar($filter);
                $user = $this->userRepository->createUser($filter);

                return $this->responseOK(200, $user, 'Đăng kí tài khoản thành công !');
            }
        } catch (Throwable $e) {
            return $this->responseError(400, $e->getMessage());
        }
    }

    public function login(RequestLogin $request)
    {
        try {
            $user = User::where('email', $request->email)->first();
            if (empty($user)) {
                return $this->responseError(400, 'Email không tồn tại !');
            }
            $credentials = request(['email', 'password']);
            if (!$token = auth()->guard('user_api')->attempt($credentials)) {
                return $this->responseError(400, 'Email hoặc mật khẩu không đúng !');
            }

            $user->access_token = $token;
            $user->token_type = 'bearer';
            $user->expires_in = auth()->guard('user_api')->factory()->getTTL() * 60;

            return $this->responseOK(200, $user, 'Đăng nhập thành công !');
        } catch (Throwable $e) {
            return $this->responseError(400, $e->getMessage());
        }
    }
}
