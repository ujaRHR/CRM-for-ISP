<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Helper\JWTToken;
use Firebase\JWT\ExpiredException;
use Firebase\JWT\Key;
use Firebase\JWT\JWT;
use Exception;


class TokenVerificationMiddleware
{

    public function handle(Request $request, Closure $next): Response
    {
        try {
            $decoded_token = JWTToken::verifyToken($request->cookie('token'));

            if ($decoded_token == ('unauthorized' || 'expired')) {
                return redirect('/customer-login');
            } else {
                $request->headers->set('id', $decoded_token->id);
                $request->headers->set('email', $decoded_token->email);
                $request->headers->set('type', $decoded_token->type);

                return $next($request);
            }
        } catch (Exception $e) {
            return redirect('/customer-login');
        }
    }
}
