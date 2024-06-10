<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignInRequest;
use App\Http\Requests\SignUpRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function signUp(SignUpRequest $request): JsonResponse
    {
        $image = $request['image'];
        if (!$image) {
            $image = null;
        }
        $image->storeAs(
            '/public/users/avatars',
            $image->getClientOriginalName()
        );
        $image = $image->getClientOriginalName();
        $image = "http://[::1]:5173/storage/app/public/users/avatars/" . $image;
        $user = User::create([
            'name' => $request['name'],
            'is_candidate' => false,
            'image' => $image,
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

    public function signIn(SignInRequest $request): JsonResponse
    {
        if (!Auth::attempt($request->all())) {
            return response()->json([
                "message" => "Неверные данные!",
            ], 401);
        }
        $user = $request->user();
        $token = $user->createToken('auth_token')->plainTextToken;

        // RETURN RESPONSE!!!
        return response()->json([
            "message" => "Успешный вход!",
            "role" => $user->role_id,
            "is_candidate" => $user->is_candidate,
            "token" => $token
        ]);
    }

    public function logOut(): JsonResponse
    {
        Auth::user()->tokens()->delete();

        // RETURN RESPONSE!!!
        return response()->json([
            "message" => "Вы вышли!"
        ]);
    }

    public function unauthorized(): JsonResponse
    {
        // RETURN RESPONSE!!!
        return response()->json([
            "message" => "Вы не авторизованы!"
        ], 403);
    }
}
