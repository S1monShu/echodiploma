<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Http\Resources\ArtistResource;
use App\Http\Resources\PlaylistResource;
use App\Http\Resources\SongResource;
use App\Models\Playlist;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArtistController extends Controller
{

    public function index(): JsonResponse
    {
        $artists = User::all()
            ->where('role_id', 2)
            ->where('is_candidate', false);
        if (!$artists->first()) {
            return response()->json([
                'status' => 404,
                'error' => 'Исполнители отсутствуют!'
            ], 404);
        }

        return response()->json([
            'status' => 200,
            'artists' => ArtistResource::collection($artists)
        ]);
    }

    public function indexApplications(): JsonResponse
    {
        $artists = User::all()
            ->where('role_id', 2)
            ->where('is_candidate', true);
        if (!$artists->first()) {
            return response()->json([
                'status' => 404,
                'error' => 'Заявки отсутствуют!'
            ], 404);
        }

        return response()->json([
            'status' => 200,
            'artists' => ArtistResource::collection($artists)
        ]);
    }

    public function store($id): JsonResponse
    {
        $artist = User::find($id);
        if (!$artist) {
            return response()->json([
                'status' => 404,
                'error' => 'Такого пользователя не существует!'
            ], 404);
        }
        if (!$artist->is_candidate && $artist->role_id == 2) {
            return response()->json([
                'status' => 400,
                'error' => 'Пользователь уже является исполнителем!'
            ], 400);
        }
        if ($artist->role_id !== 2) {
            return response()->json([
                'status' => 400,
                'error' => 'Пользователь не может быть исполнителем!'
            ], 400);
        }
        $artist->update([
            'is_candidate' => false
        ]);
        $artist->save();

        return response()->json([
            'status' => 200,
            'message' => "Теперь $artist->name исполнитель!",
            "updated_at" => Carbon::parse($artist->updated_at)->translatedFormat('j F Y')
        ]);
    }

    public function edit(Request $request): JsonResponse
    {
        $artist = Auth::user();
        $image = $request['image'];
        if (!$image) {
            $image = null;
        }
        if (!Str::contains($image, 'http://[::1]:5173/storage/app/public/users/avatars/')) {
            $image->storeAs(
                '/public/users/avatars',
                $image->getClientOriginalName()
            );
            $image = $image->getClientOriginalName();
            $image = "http://[::1]:5173/storage/app/public/users/avatars/" . $image;
        }
        if (!$artist) {
            return response()->json([
                'status' => 404,
                'error' => 'Такого пользователя не существует!'
            ], 404);
        }
        $artist->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'image' => $image,
        ]);
        $artist->save();

        return response()->json([
            'status' => 200,
            'message' => "Информация о $artist->name изменен!",
            "updated_at" => Carbon::parse($artist->updated_at)->translatedFormat('j F Y')
        ]);
    }

    public function show($id): JsonResponse
    {
        $artist = User::find($id);
        if (!$artist || $artist->role_id !== 2 || $artist->is_candidate) {
            return response()->json([
                'status' => 404,
                'error' => 'Такого исполнителя не существует!'
            ], 404);
        }

        return response()->json([
            'status' => 200,
            'artist' => [
                'id' => $artist->id,
                'is_candidate' => $artist->is_candidate,
                'name' => $artist->name,
                'image' => $artist->image,
                'email' => $artist->email,
                'role_id' => $artist->role_id,
                "created_at" => Carbon::parse($artist->created_at)->translatedFormat('j F Y'),
                'songs' => SongResource::collection($artist->songs),
                'playlists' => PlaylistResource::collection($artist->playlists)
            ]
        ]);
    }

    public function destroy($id): JsonResponse
    {
        $artist = User::find($id);
        if (!$artist) {
            return response()->json([
                'status' => 404,
                'error' => 'Такого пользователя не существует!'
            ], 404);
        }
        if (!$artist->is_candidate && $artist->role_id == 2) {
            return response()->json([
                'status' => 400,
                'error' => 'Пользователь уже является исполнителем!'
            ], 400);
        }
        if ($artist->role_id != 2) {
            return response()->json([
                'status' => 400,
                'error' => 'Пользователь не может быть исполнителем!'
            ], 400);
        }
        $artist->update([
            "role_id" => 1,
            "is_candidate" => 0
        ]);
        $artist->save();

        return response()->json([
            'status' => 200,
            'message' => "Исполнитель $artist->name отклонен!",
            "updated_at" => Carbon::parse($artist->updated_at)->translatedFormat('j F Y')
        ]);
    }

    public function setApplication(): JsonResponse
    {
        $user = Auth::user();
        if (!$user) {
            return response()->json([
                'status' => 404,
                'error' => 'Такого пользователя не существует!'
            ], 404);
        }
        if ($user->role_id == 3) {
            return response()->json([
                'status' => 400,
                'error' => 'Вы являетесь администратором!'
            ], 400);
        }
        if ($user->role_id == 2) {
            return response()->json([
                'status' => 400,
                'error' => 'Вы являетесь исполнителем!'
            ], 400);
        }
        $user->update([
            "role_id" => 2,
            "is_candidate" => 1
        ]);
        $user->save();

        return response()->json([
            'status' => 200,
            'message' => 'Заявка на исполнителя отправлена!',
            'artist' => $user
        ]);
    }

    public function showUser(): JsonResponse
    {
        $user = Auth::user();
        if (!$user) {
            return response()->json([
                'status' => 404,
                'error' => 'Такого пользователя не существует!'
            ], 404);
        }

        return response()->json([
            'status' => 200,
            'user' => [
                'id' => $user->id,
                'is_candidate' => $user->is_candidate,
                'name' => $user->name,
                'image' => $user->image,
                'email' => $user->email,
                'role_id' => $user->role_id,
                "created_at" => Carbon::parse($user->created_at)->translatedFormat('j F Y'),
                'favourites' => SongResource::collection($user->favourites)
            ]
        ]);
    }
}
