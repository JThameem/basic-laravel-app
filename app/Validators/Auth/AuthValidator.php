<?php

namespace App\Validators\Auth;

use Illuminate\Support\Facades\Validator;

class AuthValidator
{
    public static function register($data) 
    {
        $validator = Validator::make($data, [
            'name' => ['required', 'max:150', 'regex:/^[a-zA-Z\s\.]+$/i'],
            'email' => ['required', 'max:50', 'regex:/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/'],
            'password' => 'required|string',
        ]);

        if ($validator->fails()) 
        {
            return $validator;
        }
        else 
        {
            return true;
        }
    }
    

    public static function login($data)
    {
        $validator = Validator::make($data, [
            'email' => 'required|string|max:255',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) 
        {
            return $validator;
        }
        else 
        {
            return true;
        }
    }
}
