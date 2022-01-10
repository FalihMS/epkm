<?php

namespace App\Http\Middleware;

use Closure;
use app\user;
use Illuminate\Support\Facades\Auth;
class AdminMiddleware
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
        if (!Auth::user()){
            return abort('404');
        }elseif(Auth::user()->authorizeRoles(['super_admin', 'admin']) == false){
            return abort('404');
        }


        return $next($request);
    }
}
