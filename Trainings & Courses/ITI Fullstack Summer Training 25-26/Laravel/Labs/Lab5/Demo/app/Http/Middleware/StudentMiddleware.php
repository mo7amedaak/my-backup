<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class StudentMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->header('X-STUDENT-ACCESS') !== 'true') {
            return response()->json(['error' => 'Unauthorized (student)'], 401);
        }

        return $next($request);
    }
}

