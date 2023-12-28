<?php

namespace App\Services\Api;

use App\Http\Requests\Api\RequestLogin;
use App\Models\Admin;
use App\Repositories\AdminInterface;
use Throwable;

class AdminService
{
    protected AdminInterface $adminRepository;

    public function __construct(
        AdminInterface $adminRepository,
    ) {
        $this->adminRepository = $adminRepository;
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

    public function login(RequestLogin $request)
    {
        try {
            $admin = Admin::where('email', $request->email)->first();
            if (empty($admin)) {
                return $this->responseError(400, 'Email không tồn tại !');
            }
            $credentials = request(['email', 'password']);
            if (!$token = auth()->guard('admin_api')->attempt($credentials)) {
                return $this->responseError(400, 'Email hoặc mật khẩu không đúng !');
            }

            $admin->access_token = $token;
            $admin->token_type = 'bearer';
            $admin->expires_in = auth()->guard('admin_api')->factory()->getTTL() * 60;

            return $this->responseOK(200, $admin, 'Đăng nhập thành công !');
        } catch (Throwable $e) {
            return $this->responseError(400, $e->getMessage());
        }
    }
}
