<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Exception;

class AdminIdentificationMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        try {
            $user_type = $request->header('type');

            if ($user_type == 'admin') {
                return $next($request);
            } else if ($user_type == 'customer') {
                return redirect('/unauthorized');
            } else {
                return redirect('/unauthorized');
            }
        } catch (Exception $e) {
            return redirect('/unauthorized');
        }
    }
}
