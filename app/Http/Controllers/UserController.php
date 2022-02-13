<?php

namespace App\Http\Controllers;

use App\Providers\UserServiceProvider;
use \Illuminate\Http\Request;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'password' => 'required',
            'nonce' => 'required'
        ]);

        $name = $request->input('name');
        $password = $request->input('password');
        $nonce = $request->input('nonce');

        $result = UserServiceProvider::login($name, $password, $nonce);

        return $result;
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'password' => 'required',
            'email' => 'required|email',
        ]);

        $name = $request->input('name');
        $password = $request->input('password');
        $email = $request->input('email');
    
        $result = UserServiceProvider::create($name, $password, $email);

        return $result;
    }

    public function get($user_id, Request $request)
    {
        $result = UserServiceProvider::get($user_id);

        return $result;
    }

    public function list(Request $request)
    {
        $result = UserServiceProvider::list();

        return $result;
    }
}
