<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestCreateUser;
use App\Http\Requests\RequestLogin;
use App\Http\Requests\RequestUpdateInfor;
use App\Rules\ReCaptcha;
use App\Services\UserService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

class UserController extends Controller
{
    protected UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * dashboard
     *
     * @return view
     */
    public function dashboard()
    {
        if (Auth::guard('user')->check()) {
            return view('Blog.layouts.master');
        }

        return view('auth.login');
    }

    /**
     * login
     *
     * @return view
     */
    public function login()
    {
        // if (Auth::guard('user')->check()) {
        //     return redirect()->route('infor.view_infor');
        // }

        return view('blog.auth.login');
    }

    /**
     * register
     *
     * @return view
     */
    public function register()
    {
        // if (Auth::guard('user')->check()) {
        //     return redirect()->route('infor.view_infor');
        // }

        return view('blog.auth.register');
    }

    /**
     * logout
     */
    public function userLogout()
    {
        // Session::flush();
        Auth::guard('user')->logout();

        return redirect()->route('user.login.view');
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

        return $this->userService->userLogin($filter);
    }

    /**
     * userRegister
     *
     * @param RequestCreateUser $request
     * @return object
     */
    public function handleRegister(RequestCreateUser $request)
    {
        $request->validate([
            'g-recaptcha-response' => ['required', new ReCaptcha],
        ]);
        $filter = (object) [
            'email' => $request->email ?? '',
            'password' => Hash::make($request->password) ?? Hash::make(''),
            'name' => $request->name ?? '',
            'avatar' => $request->hasFile('avatar') ? $request->file('avatar') : null,
        ];

        return $this->userService->userRegister($filter);
    }

    /**
     * redirectToGoogle
     *
     * @return object
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * handleGoogleCallback
     *
     * @return object
     */
    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();

            // dd($user);
            return $this->userService->handleGoogleCallback($user);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * redirectToGithub
     *
     * @return object
     */
    public function redirectToGithub()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * handleGithubCallback
     *
     * @return object
     */
    public function handleGithubCallback()
    {
        try {
            $user = Socialite::driver('github')->user();

            // dd($user);
            return $this->userService->handleGithubCallback($user);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * redirectToGitlab
     *
     * @return object
     */
    public function redirectToGitlab()
    {
        return Socialite::driver('gitlab')->redirect();
    }

    /**
     * handleGithubCallback
     *
     * @return object
     */
    public function handleGitlabCallback()
    {
        try {
            $user = Socialite::driver('gitlab')->user();

            dd($user);
            // return $this->userService->handleGithubCallback($user);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * forgotSend
     *
     * @param Request $request
     * @return object
     */
    public function forgotSend(Request $request)
    {
        return $this->userService->forgotSend($request->email);
    }

    /**
     * forgotForm
     *
     * @return view
     */
    public function forgotForm(Request $request)
    {
        return view('blog.auth.reset_password');
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

        return $this->userService->forgotUpdate($filter);
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
     * viewInfor
     *
     * @return view
     */
    public function viewInfor()
    {
        $user = Auth::guard('user')->user();

        return view('blog.auth.view_infor', ['user' => $user, 'title' => $this->getTitle('Information Settings', 'Update Information')]);
    }

    /**
     * updateInfor
     *
     * @param RequestUpdateInfor $request
     * @return object
     */
    public function updateInfor(RequestUpdateInfor $request)
    {
        $filter = (object) [
            'name' => $request->name ?? '',
            'username' => $request->username ?? '',
            'email' => $request->email ?? '',
            'gender' => $request->gender ?? '',
            'email' => $request->email ?? '',
            'image' => $request->hasFile('avatar') ? $request->file('avatar') : null,
        ];

        return $this->userService->updateInfor($filter);
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

        return $this->userService->changePassword($filter);
    }

    /**
     * allUser
     *
     * @return view
     */
    public function allUser(Request $request)
    {
        $input = (object) [
            'search' => $request->search ?? '',
            'block' => $request->block ?? '',
            'per_page' => $request->per_page ?? 5,
            'page' => $request->page ?? 1,
        ];
        $users = $this->userService->allUser($input);

        return view('admin.manage.user', ['input' => $input, 'users' => $users, 'title' => $this->getTitle('Users', 'All User')]);
    }

    /**
     * changeStatus
     */
    public function changeStatus(Request $request)
    {
        $this->userService->changeStatus($request->id_user);
    }

    /**
     * ajaxSearchUserAdmin
     *
     * @return object
     */
    public function ajaxSearchUserAdmin(Request $request)
    {
        $input = (object) [
            'search' => $request->search ?? '',
            'block' => $request->block ?? '',
            'per_page' => $request->per_page ?? 5,
            'page' => $request->page ?? 1,
        ];

        return $this->userService->ajaxSearchUserAdmin($input);
    }
}
