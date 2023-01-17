<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class statusCheck
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
            if (Auth::user()->status == 'nonaktif') {
                Auth::logout();
                return redirect()->route('login')->with(['message' => 'Account belum di aktivasi']);
            } else {
                return $next($request);
            }
        } else {
            return redirect()->back();
        }
    }
}
