<?php

namespace App\Http\Middleware;

use Closure;

class IsAdmin
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
        if ($request->cookie('is_admin', false)) {
            if (request()->is('/admin/login')) {
                return redirect('/');
            }
            return $next($request);
        }

        return redirect()->route('admin.login');
    }
}
