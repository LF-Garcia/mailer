<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ValidarRol
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $rol)
    {
        if ( $request->user()->rol !== $rol ){
            return redirect('home');
        }

        return $next($request);
    }
}
