<?php

namespace App\Http\Middleware;

use App\Helper\JWTToken;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Exception;

class TokenCheckMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        try {
            $decode = JWTToken::verifyToken($request->cookie('token'));

            if ($decode == 'unauthorized') {
                return $next($request);
            } else {
                $user_type = $decode->type;
                if ($user_type == 'admin') {
                    return redirect('/admin-dashboard');
                } else if ($user_type == 'customer') {
                    return redirect('/customer-dashboard');
                } else {
                    return $next($request);
                }
            }
        } catch (Exception $e) {
            return $next($request);
        }
    }
}
