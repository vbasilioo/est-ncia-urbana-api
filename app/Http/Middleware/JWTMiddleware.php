<?php

namespace App\Http\Middleware;

use App\Builder\ReturnApi;
use Closure;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;

class JWTMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try{
            $user = JWTAuth::parseToken()->authenticate();

            if(!$user) 
                return ReturnApi::error("Não autorizado.", null, 401);
            
            if(env('JWT_TOKEN_VERSION') !== JWTAuth::getPayload()->get('token_version'))
                return ReturnApi::error("Token expirado.", null, 401);
        }catch(Exception $e){
            if($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException)
                return ReturnApi::error("Token inválido.", null, 401);
            
            if($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException)
                return ReturnApi::error("Token expirado.", null, 401);
            
            return ReturnApi::error("Não autorizado.", null, 401);
        }

        return $next($request);
    }
}
