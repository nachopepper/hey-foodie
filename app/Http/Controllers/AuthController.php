<?php

namespace App\Http\Controllers;

use Exception;

use Tymon\JWTAuth\Facades\JWTAuth;
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

    public function test()
    {
        return response()->json(['message' => 'auth'], 200);
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
