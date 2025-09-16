<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CourseMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->header('X-COURSE-ACCESS') !== 'true') {
            return response()->json(['error' => 'Unauthorized (course)'], 401);
        }

        return $next($request);
    }
}

