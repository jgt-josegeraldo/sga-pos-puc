<?php

namespace App\Http\Middleware;

use Closure;
use App;

class Session
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
        sleep(1);
        if ($request->bearerToken()) {
            App('session')->setId($request->bearerToken());
        }
        App('session')->start();
        return $next($request);
    }
}
