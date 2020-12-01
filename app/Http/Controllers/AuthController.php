<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\JsonResponse;


class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['login', 'password']);

        if ($token = auth('api')->attempt($credentials)) {

            $return = [
                'token'      => $this->respondWithToken($token)->original,
                'user'       => auth('api')->user(),
                'expires_in' => auth('api')->factory()->getTTL(),
            ];

            return response()->json($return);
        }
        return response()->json(
            ['error' => 'Usuario e/ou senha invalidos!'],
            200
        );
    }

    /**
     * Get the authenticated User
     *
     * @return JsonResponse
     */
    public function logout()
    {
        auth('api')->logout();

        return response()->json(['message' => 'Logout feito com sucesso']);
    }

    /**
     * Refresh a token.
     *
     * @return JsonResponse
     */
    public function refresh()
    {
        if ($this->guard()->check()) {
            return $this->respondWithToken(auth('api')->guard()->refresh());
        }

        return response()->json(
            [
                'error' => 'token_invalid',
                'message' => 'Token Válido'
            ],
            401
        );
    }

    protected function respondWithToken($token)
    {
        return response()->json(
            [
                'access_token' => $token,
                'token_type' => 'bearer',
                'expires_in' => auth('api')->factory()->getTTL()
            ]
        );
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return Guard
     */

    public function guard()
    {
        return auth('api')->guard('api');
    }

    public function me()
    {
        return response()->json(auth('api')->user());
    }
}
