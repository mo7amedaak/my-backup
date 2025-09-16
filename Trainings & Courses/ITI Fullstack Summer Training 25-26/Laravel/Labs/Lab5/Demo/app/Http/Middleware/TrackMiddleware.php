<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TrackMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->header('X-TRACK-ACCESS') !== 'true') {
            return response()->json(['error' => 'Unauthorized (track)'], 401);
        }

        return $next($request);
    }
}

