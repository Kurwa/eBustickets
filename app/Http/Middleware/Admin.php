<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\View;
use Sentinel;
use Closure;

class Admin
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
        if (Sentinel::check() && Sentinel::inRole('admin'))
        {
            return $next($request);
        }
        return View::to('permission');
    }
}
