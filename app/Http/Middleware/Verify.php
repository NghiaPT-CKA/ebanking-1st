<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;

class Verify
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
        $check = DB::table('users')->where('id',session('user')['id'])->first();
        $check = $check->email_verified_at;
        if($check == null){
            $request->session()->forget('user');
            $request->session()->flush();
            return redirect(route('show_login'))->with('alert' , 'warning,Please verify your email');
        }
        return $response;
    }
}
