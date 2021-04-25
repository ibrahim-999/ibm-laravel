<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        //if user admin show admin dashboard
        if(Auth::user()->utype ==='ADM')
            {
                return $next($request);
            }
            //if user is not admin return to login page
        else{
                session()->flush();
                return redirect()->route('login');
            }
        return $next($request);
    }
}
