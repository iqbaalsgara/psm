<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class roleOffice
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
        if (Auth::user()->role_id == 4 OR Auth::user()->role_id == 3 OR Auth::user()->role_id == 5 OR Auth::user()->role_id == 2 OR Auth::user()->role_id == 1) {
            return $next($request);
        } else {
            return redirect()->back();
        }
    }
}
