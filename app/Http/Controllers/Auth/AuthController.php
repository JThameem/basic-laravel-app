<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use App\Services\Auth\AuthService;
use App\Validators\Auth\AuthValidator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $reqData = $request->all();

        $validation = AuthValidator::register($reqData);
        if ($validation === true) 
        {
            $result = AuthService::register($reqData);
            return response()->json(['status' => @$result['status'], 'code' => @$result['code'], 'message' => @$result['message'], 'data' => @$result['data']], @$result['code']);
        }
        else
        {
            //Return the error message
            $error = ["error" => $validation->errors()->all()];
            return response()->json(["status" => false, "code" => 422, "message" => "Incorrect Request Data", "data" => $error], 422);
        }
    }

    public function login (Request $request) {
        $reqData = $request->all();

        $validation = AuthValidator::login($reqData);
        if ($validation === true) 
        {
            $result = AuthService::login($reqData);
            return response()->json(['status' => @$result['status'], 'code' => @$result['code'], 'message' => @$result['message'], 'data' => @$result['data']], @$result['code']);
        }
        else
        {
            //Return the error message
            $error = ["error" => $validation->errors()->all()];
            return response()->json(["status" => false, "code" => 401, "message" => "Login failed!", "data" => $error], 401);
        }
    }
}
