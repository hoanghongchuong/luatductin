<?php

namespace App\Http\Middleware;

use Closure;

class MemberAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'member')
    {
        if (!Auth::guard($guard)->check()) {
            return redirect()->route('member.login');
        }
        return $next($request);
    }
}
