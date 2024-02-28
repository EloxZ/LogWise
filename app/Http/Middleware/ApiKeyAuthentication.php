<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiKeyAuthentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response {
        if (!$request->header('api-key')) {
            return response()->json(['result' => 'Unauthorized'], 401);
        }

        $apiKey = $request->header('api-key');
        if ($apiKey != env('API_PASSWORD')) {
            return response()->json(['result' => 'Unauthorized'], 401);
        }

        return $next($request);
    }
}
