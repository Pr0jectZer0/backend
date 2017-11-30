<?php

namespace App\Http\Controllers;

use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Http\Request;


class AuthController extends Controller
{
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json([
                    'error' => 'Falsche E-Mail Password kombination!'
                ], 401);
            }
        } catch (JWTException $e) {
            return response()->json([
                'error' => 'Token konnte nicht erstellt werden!'
            ], 500);
        }
        return response()->json([
            'token' => $token
        ], 200);
    }
}
