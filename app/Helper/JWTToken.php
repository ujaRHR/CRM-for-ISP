<?php

namespace App\Helper;

use \Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JWTToken
{
    public static function createToken($user_id, $user_email, $user_type, $fullname): string
    {
        $key     = env('JWT_SECRET');
        $payload = [
            'iss'   => 'Laravel / CRM For ISP',
            'iat'   => time(),
            'exp'   => time() + 24 * 60 * 60,
            'id'    => $user_id,
            'email' => $user_email,
            'type'  => $user_type,
            'fullname'  => $fullname
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

    public static function createResetToken($user_email): string
    {
        $key     = env('JWT_SECRET');
        $payload = [
            'iss'   => 'CRM For ISP',
            'iat'   => time(),
            'exp'   => time() + 60 * 10,
            'email' => $user_email
        ];

        $token = JWT::encode($payload, $key, 'HS256');

        return $token;
    }

    public static function verifyResetToken($encoded_token)
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
