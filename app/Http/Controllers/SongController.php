<?php

namespace App\Http\Controllers;

use App\Http\Requests\SongRequest;
use App\Http\Resources\SongResource;
use App\Models\Genre;
use App\Models\Relations\FavouriteSong;
use App\Models\Relations\GenreSong;
use App\Models\Relations\UserSong;
use App\Models\Song;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SongController extends Controller
{
    public function index(): JsonResponse
    {
        $songs = Song::query()->orderBy('popularity', 'desc')
            ->where('is_application', false)
            ->where('agree_application', true)->get();
        if (!$songs->first()) {
            return response()->json([
                'status' => 404,
                'error' => 'Треки отсутствуют!'
            ], 404);
        }

        return response()->json([
            'status' => 200,
            'songs' => SongResource::collection($songs)
        ]);
    }

    public function indexApplications(): JsonResponse
    {
        $songs = Song::query()
            ->where('is_application', true)
            ->where('agree_application', false)->latest()->get();
        if (!$songs->first()) {
            return response()->json([
                'status' => 404,
                'error' => 'Заявки отсутствуют!'
            ], 404);
        }

        return response()->json([
            'status' => 200,
            'songs' => SongResource::collection($songs)
        ]);
    }

    public function store(SongRequest $request): JsonResponse
    {
        try {
            if (Song::where('title', $request['title'])->first() !== null) {
                return response()->json([
                    'status' => 400,
                    'message' => 'Такой трек уже существует!'
                ], 400);
            }
            if (Auth::user()->role_id != 2 || Auth::user()->is_candidate) {
                return response()->json([
                    'status' => 403,
                    'message' => 'Вы не являетесь подтвержденным исполнителем!'
                ], 403);
            }
            if (!Genre::find($request['genre_id'])) {
                return response()->json([
                    'status' => 404,
                    'message' => 'Такого жанра не существует!'
                ], 404);
            }
            $song_image = $request['image'];
            $song_file = $request['song'];
            if (!$song_file || !$song_image) {
                return response()->json([
                    'status' => 400,
                    'message' => 'Ошибка загрузки картинки!'
                ], 400);
            }
            $song_image->storeAs(
                '/public/songs/avatars',
                $song_image->getClientOriginalName()
            );
            $song_image = $song_image->getClientOriginalName();
            $song_image = "http://[::1]:5173/storage/app/public/songs/avatars/" . $song_image;
            $song_file->storeAs(
                '/public/songs/source',
                $song_file->getClientOriginalName()
            );
            $song_file = $song_file->getClientOriginalName();
            $song_file = "http://[::1]:5173/storage/app/public/songs/source/" . $song_file;
            $song_created = Song::create([
                'title' => $request['title'],
                'is_application' => true,
                'agree_application' => false,
                'popularity' => 0,
                'song_url' => $song_file,
                'image' => $song_image
            ]);
            foreach ($request['genre_id'] as $genre) {
                GenreSong::create([
                    'genre_id' => (int)$genre,
                    'song_id' => $song_created->id
                ]);
            }
            UserSong::create([
                'user_id' => Auth::user()->id,
                'song_id' => $song_created->id
            ]);

            return response()->json([
                'status' => 200,
                'message' => 'Песня отправлена в заявки!',
                'application_song' => $song_created
            ]);
        } catch (\Exception $error) {
            return response()->json([
                'error' => $error->getMessage()
            ]);
        }
    }

    public function confirmSong(int $id): JsonResponse
    {
        $song = Song::find($id);
        if (!$song) {
            return response()->json([
                'status' => 404,
                'error' => 'Такого трека не существует!'
            ], 404);
        }
        if (!$song->is_application && $song->agree_application) {
            return response()->json([
                'status' => 400,
                'error' => 'Трек уже доступен!'
            ], 400);
        }
        $song->update([
            'is_application' => false,
            'agree_application' => true
        ]);
        $song->save();

        return response()->json([
            'status' => 200,
            'message' => "Трек $song->title одобрен!",
            "updated_at" => Carbon::parse($song->updated_at)->translatedFormat('j F Y')
        ]);
    }

    public function rejectSong(int $id): JsonResponse
    {
        $song = Song::find($id);
        if (!$song) {
            return response()->json([
                'status' => 404,
                'error' => 'Такого трека не существует!'
            ], 404);
        }
        if (!$song->is_application && $song->agree_application) {
            return response()->json([
                'status' => 400,
                'error' => 'Трек уже доступен!'
            ], 400);
        }
        $song->update([
            "is_application" => false,
            "agree_application" => false
        ]);
        $song->save();

        return response()->json([
            'status' => 200,
            'message' => "Трек $song->title отклонен!",
            "updated_at" => Carbon::parse($song->updated_at)->translatedFormat('j F Y')
        ]);
    }

    public function setFavourite(int $id): JsonResponse
    {
        $user = Auth::user();
        $song = Song::find($id);
        if (!$song || !$song->agree_application || $song->is_application) {
            return response()->json([
                'status' => 404,
                'error' => 'Такой трек отсутсвует!'
            ], 404);
        }
        if (!$user) {
            return response()->json([
                'status' => 404,
                'error' => 'Пользователь не авторизован!'
            ], 404);
        }
        $checkSong = FavouriteSong::all()->where('user_id', $user->id)->where('song_id', $song->id)->first();
        if ($checkSong !== null) {
            $checkSong->delete();
            return response()->json([
                'status' => 200,
                'message' => "$song->title, удалено из понравившихся!"
            ]);
        }

        FavouriteSong::create([
            'user_id' => $user->id,
            'song_id' => $song->id
        ]);
        return response()->json([
            'status' => 200,
            'message' => "$song->title, добавлено в понравившиеся!"
        ]);
    }
}
