<?php

namespace App\Http\Middleware;

use App\Http\Controllers\UserController;
use Closure;
use Illuminate\Support\Facades\DB;

class CheckUser
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
        if(empty(session('user'))){
            return  redirect(route('show_login'))->with('alert' , 'warning,Logon session timeout');
        }

        return $next($request);
    }
}
