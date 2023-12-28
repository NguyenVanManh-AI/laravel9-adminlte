<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\RequestLogin;
use App\Models\Admin;
use App\Services\Api\AdminService;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    protected AdminService $adminService;

    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
    }

    public function test()
    {
        // Kiểm tra người dùng của guard 'user_api'
        $guards = [];
        $user = Auth::guard('user_api')->user();
        if ($user && $user->name) {
            $obj = (object) [
                'guard' => 'user_api',
                'name' => $user->name,
            ];
            $guards[] = $obj;
        }

        // Kiểm tra người dùng của guard 'admin_api'
        $admin = Auth::guard('admin_api')->user();
        if ($admin && $admin->name) {
            $obj = (object) [
                'guard' => 'admin_api',
                'name' => $admin->name,
            ];
            $guards[] = $obj;
        }

        return response()->json([
            'message' => 'test',
            'guards' => $guards,
        ], 200);
    }

    public function login(RequestLogin $request)
    {
        return $this->adminService->login($request);
    }

    public function profile()
    {
        return response()->json([
            'message' => 'Xem thông tin cá nhân thành công !',
            'data' => auth('admin_api')->user(),
            'status' => 200,
        ], 200);
    }
}
