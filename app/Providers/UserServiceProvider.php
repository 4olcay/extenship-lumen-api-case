<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    public function login($name, $password, $nonce)
    {
        $result = User::login($name, $password, $nonce);

        if(!$result)
        {
            return response()->json([
                'status' => 'error',
                'message' => 'User not found'
            ], 404);
        }

        return $result;
    }

    public function create($name, $password, $email)
    {
        $result = User::create($name, $password, $email);

        return $result;
    }

    public function get($user_id)
    {
        $result = User::get($user_id);

        if(!$result)
        {
            return response()->json([
                'status' => 'error',
                'message' => 'User not found'
            ], 404);
        }

        return $result;
    }

    public function list()
    {
        $result = User::list();

        if(!$result)
        {
            return response()->json([
                'status' => 'error',
                'message' => 'User not found'
            ], 404);
        }

        return $result;
    }
}
