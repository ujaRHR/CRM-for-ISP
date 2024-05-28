<?php

namespace App\Helper;

use \Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JWTToken
{
    public static function createToken($user_id, $user_email) : string
    {
        $key     = env('JWT_SECRET');
        $payload = [
            'iss'   => 'Laravel / CRM For ISP',
            'iat'   => time(),
            'exp'   => time() + (60 * 60 * 30),
            'id'    => $user_id,
            'email' => $user_email
        ];

        $token = JWT::encode($payload, $key, 'HS256');

        return $token;
    }

    public static function verifyToken($encoded_token) : string|object
    {
        if ($encoded_token != null) {
            $key     = env('JWT_SECRET');
            $decoded = JWT::decode($encoded_token, new Key($key, 'HS256'));

            return $decoded;

        } else {
            return response()->json([
                'status'  => 'unauthorized',
                'message' => 'authentication failed!'
            ]);
        }
    }
}
