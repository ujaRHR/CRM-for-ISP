<?php

namespace App\Helper;

use \Firebase\JWT\JWT;

class JWTToken
{
    public static function createToken($user_id, $user_email) : string
    {
        $key     = env('JWT_SECRET');
        $payload = [
            'iss'   => 'Laravel / CRM For ISP',
            'iat'   => time(),
            'exp'   => time() + (60 * 60),
            'id'    => $user_id,
            'email' => $user_email
        ];

        $token = JWT::encode($payload, $key, 'HS256');

        return $token;
    }
}
