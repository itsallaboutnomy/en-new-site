<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller

{
    public function login(Request $request){

        $login = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if(!auth()->attempt($login)){
            throw ValidationException::withMessages(['error'=>'Invalid User Name or Password']);
        }

        $token = auth()->user()->createToken('authToken')->accessToken;
        $user = auth()->user();
        unset($user->password_str);
        return response(['message' =>'user login successfully',
            'user'=> $user,
            'roles'=> auth()->user()->roles,
            'token'=>$token,
            'token_expire_date' => auth()->user()->createToken('authToken')->token->expires_at->toDateTimeString()]);

    }

    public function logout(Request $request){
        $request->user()->token()->revoke();
        return response(['message' =>'user logout  successfully'],200);
    }
    public function user(Request $request){
        $token = auth()->user()->createToken('authToken')->accessToken;
        return response([
            'user'=> auth()->user(),
            'roles'=>auth()->user()->roles,
            'token'=> $token,
            'token_expire_date' => auth()->user()->createToken('authToken')->token->expires_at->toDateTimeString()]);
    }
}
