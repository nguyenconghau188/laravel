<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UserLoginMiddleware
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
            if ($user->status == 1){
                $this->shareUser();
                return $next($request);
            }
            Auth::logout();
        }
        return $next($request);

    }

    public function shareUser()
    {
        if (Auth::check()){
            view()->share('user_active', Auth::user());
        }
    }
}
