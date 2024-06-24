<?php

namespace App\Helper;

use \Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Firebase\JWT\ExpiredException;

class JWTToken
{
    public static function createToken($user_id, $user_email, $user_type): string
    {
        $key     = env('JWT_SECRET');
        $payload = [
            'iss'   => 'Laravel / CRM For ISP',
            'iat'   => time(),
            'exp'   => time() + (10),
            'id'    => $user_id,
            'email' => $user_email,
            'type'  => $user_type
        ];

        $token = JWT::encode($payload, $key, 'HS256');

        return $token;
    }

    public static function verifyToken($encoded_token)
    {
        if ($encoded_token != null) {
            $key = env('JWT_SECRET');
            $result = JWT::decode($encoded_token, new Key($key, 'HS256'));
            return $result;
        } else {
            return 'unauthorized';
        }
    }
}
