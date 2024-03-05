<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;
use Exception;

class JWTadminMiddleware
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
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
                return response()->json(['error' => 'Token is Invalid'], 403);
            } else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) {
                return response()->json(['error' => 'Token is Expired'], 403);
            } else {
                return response()->json(['error' => 'Authorization Token not found'], 403);
            }
        }
        if($user->role != 'admin'){
            return response()->json(['error' => 'Not logged in as admin'], 403);
        }
        return $next($request);
    }
}
