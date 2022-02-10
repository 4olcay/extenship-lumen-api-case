<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use \Firebase\JWT\JWT;

class AuthServiceProvider extends ServiceProvider
{
    public function requireToken($token)
    {
        if(!isset($token)) {
            return null;
        }
    
        try {
            $decoded = JWT::decode($token, env('JWT_SECRET'), ['HS256']);
            return $decoded;
        } catch(\Exception $e) {
            return null;
        }
    }
}
