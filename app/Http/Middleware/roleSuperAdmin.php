<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class roleSuperAdmin
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
        if (!is_null(Auth::user())) {
            if (Auth::user()->role_id == 1) {
                return $next($request);
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }
}
