<?php

namespace IT_Glance_Forum\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class checkAdmin
{
    /**
     * @param $request
     * @param Closure $next
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {

        if (Auth::check()) {
            $route = Route::getCurrentRoute()->getAction();
            // print_r(Auth::user()->user_typeid);die();
            if (array_key_exists('role', $route)) {
                if (Auth::user()->user_type_id != $route['role']) {
                    return redirect()->route('web.login');
                }
            }
        } else {
            return Redirect::route('web.demo');
        }
        return $next($request);
    }
}
