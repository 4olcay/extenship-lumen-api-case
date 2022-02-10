<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Firebase\JWT\JWT;

class User extends Model
{  
    public function login($name, $password)
    {
        $user = User::where('name', $name)
                    ->where('password', $password)
                    ->first();

        if(!$user)
            return json_encode(["error" => "user not found"]);

        $token = JWT::encode([
            'user_id' => $user->id,
            'email' => $user->email,
            'iat' => time(),
            'exp' => time() + (60 * 60 * 24 * 7)
        ], env('JWT_SECRET'), 'HS256');

        return $token;
    }

    public function create($name, $password, $email)
    {
        $user = new User();
        $user->name = $name;
        $user->password = $password;
        $user->email = $email;
        $user->save();

        return $user;
    }

    public function updatePassword($id, $password)
    {
        $user = User::find($id);

        if(!$user)
            return json_encode(["error" => "user not found"]);

        $user->password = $password;
        $user->save();

        return json_encode(["success" => "user " . $user->name . " password updated"]);
    }

    public function updateName($id, $name)
    {
        $user = User::find($id);

        if(!$user)
            return json_encode(["error" => "user not found"]);

        $user->name = $name;
        $user->save();

        return json_encode(["success" => "user " . $user->name . " name updated"]);
    }

    public function updateMail($id, $email)
    {
        $user = User::find($id);

        if(!$user)
            return json_encode(["error" => "user not found"]);

        $user->email = $email;
        $user->save();

        return json_encode(["success" => "user " . $user->name . " email updated as " . $email]);
    }

    public function get($id)
    {
        $user = User::where('id', $id)
                    ->select('id', 'name', 'email')
                    ->first();

        if(!$user)
            return json_encode(["error" => "user not found"]);

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
