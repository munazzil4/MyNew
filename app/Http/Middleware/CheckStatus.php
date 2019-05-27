<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class CheckStatus
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
		$response = $next($request);
		
		if(Auth::check() && Auth::user()->user_status != 1){
            Auth::logout();
            return redirect('/login')->with('erro_login', 'Your Not an Admin');
        }
		
        return $response;
    }
}
