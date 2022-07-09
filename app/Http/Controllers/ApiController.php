<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{
    public function login(Request $request){
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)) {
            $user = $request->user();
            $tokenResult = $user->createToken('Access Token');
            $response = [
                'result' => true,
                'message' => 'Successfully login',
                'data' => [
                    'access_token' => $tokenResult->accessToken,
                    'token_type' => 'Bearer',
                    'expires_at' => Carbon::parse($tokenResult->token->expires_at)->toDateTimeString()
                ]
            ];
        } else
            $response = ['result' => false, 'message' => 'Login unsuccessfully, please check email or password'];
        return json_encode($response);
    }

    public function logout(Request $request){
        $request->user()->token()->revoke();
        return ['result' => true, 'message' => 'Successfully logged out'];
    }
}
