<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Exception;
use App\Helper\JWTToken;

class ResetPasswordMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        try {
            $decoded_token = JWTToken::verifyResetToken($request->cookie('reset'));

            if ($decoded_token == 'unauthorized') {
                return redirect('/reset-password');
            } else {
                $request->headers->set('email', $decoded_token->email);
                return $next($request);
            }
        } catch (Exception $e) {
            return redirect('/reset-password');
        }
    }
}
