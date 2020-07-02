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
        return response(['user'=>$user, 'access_token'=>$accessToken,'message' => 'Registro Exitoso'], 200);
    }

    public function login(Request $request)
    {
        $loginData = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if (!auth()->attempt($loginData)) {
            return response(['message'=>'Credenciales incorrectas']);
        }

        $accessToken = auth()->user()->createToken('authToken')->accessToken;
        return response(['user'=>auth()->user(), 'access_token'=>$accessToken, 'message' => 'Login Exitoso'], 200);
    }
}
