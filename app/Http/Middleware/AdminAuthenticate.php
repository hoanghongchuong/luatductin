<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class AdminAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'admin')
    {
        return $next($request);
        // if(Auth::guard($guard)->check()){
        //     $currentAdmin                = Auth::guard($guard)->user();
        //     view()->share('currentAdmin', $currentAdmin);
            
        //     return $next($request);
        // }
        
        // return redirect('backend/login');
        if (!Auth::guard($guard)->check()) {
            return redirect('backend/login');
        }
 
        return $next($request);
    }
}
