<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use View;

class AdminLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->level == 1) {
                $this->DangNhap();
                return $next($request);
            }
            else {
                Auth::logout();
                return redirect('admin/login');
            }
        }
        else {
            return redirect('admin/login');
        }

    }
    function DangNhap()
    {
        if (Auth::check()) {
            View::share('user_login', Auth::user());
        }
    }
}
