<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Login and user token generation
     *
     * @param  [string] email
     * @param  [string] password
     * @return array{result: boolean, message: string, data: array}[
     *  'access_token' => string,
     *  'token_type' => string,
     *  'expires_at' => string
     * ]
     */
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

    /**
     * Revoke the user token (logout)
     *
     * @return array{result: boolean, message: string}[]
     */
    public function logout(Request $request){
        $request->user()->token()->revoke();
        return ['result' => true, 'message' => 'Successfully logged out'];
    }
}
