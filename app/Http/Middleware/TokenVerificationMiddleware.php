<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Helper\JWTToken;
use Exception;
use Nette\Schema\Expect;

class TokenVerificationMiddleware
{
    
    public function handle(Request $request, Closure $next) : Response
    {
        try {
            $encoded_token = $request->cookie('token');
            $decode        = JWTToken::verifyToken($encoded_token);
            if ($decode == 'unauthorized') {
                return redirect('/admin-login');
            } else {
                $request->headers->set('id', $decode->id);
                $request->headers->set('email', $decode->email);

                return $next($request);
            }
        } catch (Exception $e) {
            return redirect('/admin-login');
        }
    }
}
