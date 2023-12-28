<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        /*
            Dành cho trường hợp middleware có nhiều guard , ví dụ :
            Route::middleware('check.auth:admin_api,user_api')->group(function () {
            Route::middleware('check.auth:admin,user')->group(function () {

            TH1 : Một Guard , ví dụ : check.auth:user thì không có user (user chưa login) thì tới vòng lặp for tiếp theo để thông báo 401 hoặc trỏ đến trang login
            TH2 : Nhiều Guard , cũng tương tự , ví dụ : check.auth:user,admin => lặp qua hết nếu không có cái nào thõa mãn thì chuyển đến for tiếp theo để
            thôn báo 401 hoặc chuyển trến trang login
        */

        // Lặp qua hết tất cả các guard
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                return $next($request);
            }
        }

        // Thông báo 401 hoặc trỏ đến trang cần thiết
        foreach ($guards as $guard) {
            if ($guard == 'user') {
                // return redirect()->route('errors.401');
                return redirect()->route('user.login.view');
            }

            if ($guard == 'admin') {
                // return redirect()->route('errors.401');
                return redirect()->route('admin.login.view');
            }

            if ($guard == 'admin_api') {
                return response()->json(['error' => 'Unauthenticated.'], 401);
                // ở đây json ta có thể trả về tùy ý và thêm nhiều param khác nữa
            }

            if ($guard == 'user_api') {
                return response()->json(['error' => 'Unauthenticated.'], 401);
            }
        }
    }
}
