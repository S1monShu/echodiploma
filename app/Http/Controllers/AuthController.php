<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignInRequest;
use App\Http\Requests\SignUpRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function signUp(SignUpRequest $request):JsonResponse
    {
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        $token = $user->createToken('auth_token')->plainTextToken;

        // RETURN RESPONSE!!!
        return response()->json([
            "message" => "Вы зарегистрированы!",
            "user" => $user,
            "token" => $token
        ], 201);
    }

    public function signIn(SignInRequest $request):JsonResponse
    {
        if (!Auth::attempt($request->all())) {
            return response()->json([
                "message" => "Неверные авторизационные данные!",
            ], 401);
        }
        $user = $request->user();
        $token = $user->createToken('auth_token')->plainTextToken;

        // RETURN RESPONSE!!!
        return response()->json([
            "message" => "Успешный вход!",
            "token" => $token
        ]);
    }

    public function logOut():JsonResponse
    {
        Auth::user()->tokens()->delete();

        // RETURN RESPONSE!!!
        return response()->json([
            "message" => "Вы вышли!"
        ]);
    }

    public function unauthorized():JsonResponse
    {
        // RETURN RESPONSE!!!
        return response()->json([
            "message" => "У вас нет привелегий!"
        ], 403);
    }
}
