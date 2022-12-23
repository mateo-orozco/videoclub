<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class JwtMiddleware
{
    
    
    public function handle(Request $request, Closure $next)
    {
        try
        {
            JWTAuth::parseToken()->authenticate();
            return $next($request);
        }
        catch (\Tymon\JWTAuth\Exceptions\TokenBlacklistedException $e)
        {
            return response(['status' => 'Token inválido'], 401);
        }
        catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e)
        {
            return response(['status' => 'Token inválido'], 401);
        }
        catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e)
        {
            return response(['status' => 'El token ha expirado'], 401);
        }
        catch (\Tymon\JWTAuth\Exceptions\JWTException $e)
        {
            return response(['status' => 'El token no ha sido encontrado'], 401);
        }
        catch (Exception $e)
        {
            return response(['status' => 'El token no ha sido encontrado'], 401);
        }
        
    }
}
