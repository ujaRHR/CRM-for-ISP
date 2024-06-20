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
use Nette\Schema\Expect;

class TokenVerificationMiddleware
{

    public function handle(Request $request, Closure $next): Response
    {
        try {
            $decoded_token = JWTToken::verifyToken($request->cookie('token'));

            if ($decoded_token == ('unauthorized' || 'expired')) {
                return redirect('/admin-error');
            } else {
                $request->headers->set('id', $decoded_token->id);
                $request->headers->set('email', $decoded_token->email);
                $request->headers->set('type', $decoded_token->type);

                return $next($request);
            }
        } catch (ExpiredException $e) {
            $decoded_token = JWT::decode($request->cookie('token'), new Key(env('JWT_SECRET'), 'HS256'), 'JWT', 'HS256', false);
            if (isset($decoded_token->type) && $decoded_token->type == 'admin') {
                return redirect('/admin-login');
            } else {
                return redirect('/customer-login');
            }
        } catch (Exception $e) {
            return redirect('/customer-login');
        }
    }
}
