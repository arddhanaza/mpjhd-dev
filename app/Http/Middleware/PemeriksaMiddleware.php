<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PemeriksaMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (session(0)->status == 'Pemeriksa') {
            return $next($request);
        }
        return redirect(route('logout'));
    }
}
