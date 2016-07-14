<?php

namespace App\Http\Middleware;

use Sentinel;
use Closure;

class SuperAdmin
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
        if (Sentinel::check() && Sentinel::inRole('super_admin'))
        {
            return $next($request);
        }
        return View::to('permission');
    }
}
