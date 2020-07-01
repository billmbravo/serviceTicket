<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validateDAta = $request->validate([
            'name'=>'required|max:55',
            'email'=>'email|required|unique:users',
            'password'=>'required|confirmed'
        ]);

        $validateDAta['password'] = bcrypt($request->password);
        $user = User::create($validateDAta);
        $accessToken = $user->createToken('authToken')->accessToken;
        return response(['user'=>$user, 'access_token'=>$accessToken]);
    }

    public function login(Request $request)
    {
        $loginData = $rerquest->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if (!auth()->attemp($loginData)) {
            return response(['message'=>'Credenciales incorrectas']);
        }

        $accessToken = auth()->user()->createToken('authToken')->accessToken;
        return response(['user'=>auth()->user(), 'access_token'=>$accessToken]);
    }
}
