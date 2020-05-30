<?php

namespace App\Http\Middleware;

use Closure;
use App;

class Auth
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
        if (App('session')->get('userId')) {
            return $next($request);
        }
        return response()->json([
            'status' => 'fail',
            'error' => 'Usuário não autenticado'
        ], 401);
    }
}
