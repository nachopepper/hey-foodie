<?php

namespace App\Http\Controllers;

use JWTAuth;
use Exception;

use App\Http\Controllers\Controller;
use App\Http\Requests\auth\AuthRequest;
use App\Models\User;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function login(AuthRequest $request)
    {
        try {
            $email = $request->email;
            $password = $request->password;

            $user = User::updateOrCreate(['email' => $email], ['password' => $password]);
            $token = JWTAuth::fromUser($user);

            return $this->respondWithToken($token);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }
}
