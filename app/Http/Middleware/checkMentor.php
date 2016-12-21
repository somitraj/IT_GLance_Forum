<?php

namespace IT_Glance_Forum\Http\Middleware;

use Closure;

class checkMentor
{
    public function handle($request, Closure $next)
    {

        if(Auth::check())
        {
            $route=Route::getCurrentRoute()->getAction();
            // print_r(Auth::user()->user_typeid);die();
            if(array_key_exists('usertype',$route))
            {
                if(Auth::user()->user_type_id!=$route['usertype'])
                {
                    return redirect()->route('login');
                }
            }
        }
        return $next($request);
    }
}
