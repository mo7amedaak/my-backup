<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EmployerMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->role === 'employer') {
            return $next($request);
        }

        abort(403, 'Unauthorized');
    }
}
