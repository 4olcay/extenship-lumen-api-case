<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Firebase\JWT\JWT;
use Illuminate\Support\Facades\Hash;

class User extends Model
{  
    public function login($name, $password, $nonce)
    {
        $user = User::where('name', $name)
                    ->first();

        if(!$user)
            return false;

        if(Hash::make($nonce, $user->password) == Hash::make($nonce, $password))
        {
            $token = JWT::encode([
                'user_id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'iat' => time(),
                'exp' => time() + (60 * 60 * 24 * 7)
            ], env('JWT_SECRET'), 'HS256');

            return $token;
        }
        else
        {
            return false;
        }
    }

    public function create($name, $password, $email)
    {
        $user = new User();
        $user->name = $name;
        $user->password = Hash::make($password);
        $user->email = $email;
        $user->save();

        return $user;
    }

    public function get($id)
    {
        $user = User::where('id', $id)
                    ->select('id', 'name', 'email')
                    ->first();

        if(!$user)
            return false;

        return $user;
    }

    public function list()
    {
        $users = User::select('id', 'name', 'email')
                    ->get();

        if(!$users)
            return false;

        return $users;
    }
}
