<?php

namespace App\Http\Middleware;

use Sentinel;
use Closure;

class SentinelAuth
{
    protected function nocache($response)
    {
        $response->headers->set('Cache-Control','nocache, no-store, max-age=0, must-revalidate');
        $response->headers->set('Expires','Fri, 01 Jan 1990 00:00:00 GMT');
        $response->headers->set('Pragma','no-cache');
        return $response;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */


    public function handle($request, Closure $next)
    {
        if (Sentinel::check()) {
            return $this->nocache( $next($request) );
//            return $next($request);
        }
        return redirect()->guest('login');
    }

}
