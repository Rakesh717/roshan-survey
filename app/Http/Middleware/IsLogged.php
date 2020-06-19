<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cookie;

class IsLogged
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
        if (Cookie::get('user_id', false)) {
            if (request()->is('/login')) {
                return redirect('/');
            }
            return $next($request);
        }

        return redirect()->route('user.login');
    }
}
