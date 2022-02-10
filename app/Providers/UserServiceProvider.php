<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    public function login($name, $password)
    {
        $result = User::login($name, $password);

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

        return $result;
    }

    public function updatePassword($id, $password)
    {
        $result = User::updatePassword($id, $password);

        return $result;
    }

    public function updateMail($id, $email)
    {
        $result = User::updateMail($id, $email);

        return $result;
    }

    public function list()
    {
        $result = User::list();

        if(!$result)
            return response()->json(['message' => 'No user found'], 404);

        return $result;
    }
}
