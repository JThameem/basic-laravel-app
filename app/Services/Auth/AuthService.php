<?php

namespace App\Services\Auth;

use App\Models\User;

class AuthService
{
    public static function register($reqData)
    {
        try {
            $user = User::insertRecord($reqData);
            $user->token =  $user->createToken('authToken')->accessToken;
            $result = ['status' => true, 'code' => 200, 'message' => 'User registered successfully', 'data' => @$user];
        } catch (\Exception $e) {
            $error['errors'] = [
                'code' => $e->getCode(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'message' => $e->getMessage(),
            ];
            $result = ['status' => false, 'code' => 422, 'message' => 'User registration failed!', 'data' => @$error];
        }
        return $result;
    }

    public static function login($reqData)
    {
        $credentials = [
            'email' => @$reqData['email'],
            'password' => @$reqData['password'],
        ];
        
        if (auth()->attempt($credentials)) 
        {
            $user = auth()->user();

            $token = $user->createToken('authToken')->accessToken;
            $data = ['authenticated_user' => $user, 'token' => $token];
            return ["status" => true, "code" => 200, "message" => 'Login Successfully', "data" => $data]; 
        }
        else 
        {
            $message = ['error' => 'Username or password is invalid'];
            return ["status" => false, "code" => 401, "message" => "Login Denied", "data" => $message];
        }
    }
}
