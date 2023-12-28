<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestLogin;
use App\Http\Requests\RequestUpdateInforAdmin;
use App\Models\Admin;
use App\Rules\ReCaptcha;
use App\Services\AdminService;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    protected AdminService $adminService;

    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
    }

    public function test()
    {
        // Kiểm tra người dùng của guard 'user'
        $user = Auth::guard('user')->user();
        if ($user && $user->name) {
            dump($user->name);
        }

        // Kiểm tra người dùng của guard 'admin'
        $admin = Auth::guard('admin')->user();
        if ($admin && $admin->name) {
            dump($admin->name);
        }
    }

    /**
     * dashboard
     *
     * @return view
     */
    public function dashboard()
    {
        // if (Auth::guard('admin')->check()) {
        //     return redirect()->route('admin.view_infor');
        // }

        return redirect()->route('admin.login');
    }

    /**
     * login
     *
     * @return view
     */
    public function login()
    {
        // if (Auth::guard('admin')->check()) {
        //     return redirect()->route('admin.view_infor');
        // }

        return view('admin.auth.login');
    }

    /**
     * logout
     */
    public function adminLogout()
    {
        // Session::flush();
        Auth::guard('admin')->logout();

        return redirect()->route('admin.login.view');
    }

    /**
     * userLogin
     *
     * @param RequestLogin $request
     * @return object
     */
    public function handleLogin(RequestLogin $request)
    {
        $request->validate([
            'g-recaptcha-response' => ['required', new ReCaptcha],
        ]);
        $filter = (object) [
            'email' => $request->email ?? '',
            'password' => $request->password ?? '',
            'remember' => $request->remember ?? false,
        ];

        return $this->adminService->adminLogin($filter);
    }

    /**
     *allAdmin
     *
     * @return array
     */
    public function allAdmin(Request $request)
    {
        if (Auth::guard('admin')->user()->role == 0) {
            Toastr::warning('Only Super admin or Manager has access to this !');

            return redirect()->route('admin.user');
        }
        $input = (object) [
            'search' => $request->search ?? '',
            'role' => $request->role ?? '',
            'per_page' => $request->per_page ?? 5,
            'page' => $request->page ?? 1,
        ];
        $admins = $this->adminService->allAdmin($request, $input);

        return view('admin.manage.admin', ['input' => $input, 'admins' => $admins, 'title' => $this->getTitle('Admins', 'All Admins')]);
    }

    /**
     * getTitle
     *
     * @param string $title_main
     * @param string $title_sub
     * @return array
     */
    public function getTitle($titleMain, $titleSub)
    {
        $title['title_main'] = $titleMain;
        $title['title_sub'] = $titleSub;

        return $title;
    }

    /**
     * addAdmin
     *
     * @return view
     */
    public function addAdmin(Request $request)
    {
        $newAdmin = (object) [
            'name' => $request->name,
            'email' => $request->email,
        ];

        return $this->adminService->addAdmin($newAdmin);
    }

    /**
     * changeRole
     *
     * @param Request $request
     */
    public function changeRole(Request $request)
    {
        $filter = (object) [
            'id' => $request->id_admin,
            'role' => $request->role,
        ];

        return $this->adminService->changeRole($filter);
    }

    /**
     * deleteAdmin
     *
     * @param $id_admin
     */
    public function deleteAdmin(Request $request, $id_admin)
    {
        return $this->adminService->deleteAdmin($id_admin);
    }

    /**
     * ajaxSearchInforAdmin
     *
     * @param Request $request
     */
    public function ajaxSearchInforAdmin(Request $request)
    {
        $input = (object) [
            'search' => $request->search ?? '',
            'role' => $request->role ?? '',
            'per_page' => $request->per_page ?? 5,
            'page' => $request->page ?? 1,
        ];

        return $this->adminService->ajaxSearchInforAdmin($input);
    }

    /**
     * updateInfor
     *
     * @param RequestUpdateInforAdmin $request
     * @return object
     */
    public function updateInfor(RequestUpdateInforAdmin $request)
    {
        $filter = (object) [
            'name' => $request->name ?? '',
            'image' => $request->hasFile('avatar') ? $request->file('avatar') : null,
        ];

        return $this->adminService->updateInfor($filter);
    }

    /**
     * forgotSend
     *
     * @param Request $request
     * @return object
     */
    public function forgotSend(Request $request)
    {
        return $this->adminService->forgotSend($request->email);
    }

    /**
     * forgotForm
     *
     * @return view
     */
    public function forgotForm(Request $request)
    {
        return view('admin.auth.reset_password');
    }

    /**
     * forgotUpdate
     *
     * @param Request $request
     * @return object
     */
    public function forgotUpdate(Request $request)
    {
        $filter = (object) [
            'token' => $request->token ?? '',
            'new_password' => $request->new_password ?? '',
            'confim_new_password' => $request->confim_new_password ?? '',
        ];

        return $this->adminService->forgotUpdate($filter);
    }

    /**
     * viewInfor
     *
     * @return view
     */
    public function viewInfor()
    {
        $admin = Auth::guard('admin')->user();

        return view('admin.auth.view_infor', ['admin' => $admin, 'title' => $this->getTitle('Information Settings', 'Update Information')]);
    }

    /**
     * changePassword
     *
     * @param Request $request
     * @return object
     */
    public function changePassword(Request $request)
    {
        $filter = (object) [
            'old_password' => $request->old_password ?? '',
            'confirm_old_password' => $request->confirm_old_password ?? '',
            'new_password' => $request->new_password ?? '',
        ];

        return $this->adminService->changePassword($filter);
    }

    /**
     * statistical
     */
    public function statistical()
    {
        return $this->adminService->statistical();
    }

    /**
     * statisticalArticle
     *
     * @param Request $request
     * @return object
     */
    public function statisticalArticle(Request $request)
    {
        return $this->adminService->statisticalArticle($request);
    }

    /**
     * statisticalComment
     *
     * @param Request $request
     * @return object
     */
    public function statisticalComment(Request $request)
    {
        return $this->adminService->statisticalComment($request);
    }

    /**
     * statisticalUser
     *
     * @param Request $request
     * @return object
     */
    public function statisticalUser(Request $request)
    {
        return $this->adminService->statisticalUser($request);
    }
}
