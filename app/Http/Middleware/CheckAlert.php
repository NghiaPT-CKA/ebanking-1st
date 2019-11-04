<?php

namespace App\Http\Middleware;

use Closure;
use RealRashid\SweetAlert\Facades\Alert;

class CheckAlert
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
                if(session()->has('alert')) {
                    $alert = session()->pull('alert');
                    $alert = explode(',', $alert);
                    $alert = [$alert[0] => $alert[1]];
                    foreach ($alert as $k => $v) {
                        (Alert::$k($k, $v));
                    }
                    session()->flash('comment', '');
                }
        return  $next($request);
    }
}
