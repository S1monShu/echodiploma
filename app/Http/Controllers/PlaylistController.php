<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Support\Str;
use App\Http\Requests\PlaylistRequest;
use App\Http\Resources\ArtistResource;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\PlaylistResource;
use App\Http\Resources\SongResource;
use App\Models\Playlist;
use App\Models\Relations\PlaylistSong;
use App\Models\Relations\UserPlaylist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class PlaylistController extends Controller
{
    public function index(): JsonResponse
    {
        $playlist = Playlist::all();
        if (!$playlist) {
            return response()->json([
                'status' => 404,
                'error' => 'Плейлистов не найдено!'
            ], 404);
        }

        return response()->json([
            'status' => 200,
            'playlists' => PlaylistResource::collection($playlist)
        ]);
    }
    public function show($id): JsonResponse
    {
        $playlist = Playlist::find($id);
        if (!$playlist) {
            return response()->json([
                'status' => 404,
                'error' => 'Такого плейлиста нет!'
            ], 404);
        }

        return response()->json([
            'status' => 200,
            'playlist' => [
                'id' => $playlist->id,
                'title' => $playlist->title,
                'image' => $playlist->image,
                'songs' => SongResource::collection($playlist->songs),
                'artists' => $playlist->artists
            ]
        ]);
    }

    public function edit(PlaylistRequest $request, int $id): JsonResponse
    {
        try {
            $playlist = Playlist::find($id);
            $playlist_image = $request['image'];
            if (!$playlist_image) {
                $playlist_image = $playlist->image;
            }
            if (!Str::contains($playlist_image, 'http://[::1]:5173/storage/app/public/playlists/avatars/')) {
                $playlist_image->storeAs(
                    '/public/playlists/avatars',
                    $playlist_image->getClientOriginalName()
                );
                $playlist_image = $playlist_image->getClientOriginalName();
                $playlist_image = "http://[::1]:5173/storage/app/public/playlists/avatars/" . $playlist_image;
            }
            $playlist->update([
                'title' => $request['title'],
                'image' => $playlist_image
            ]);
            $playlist->save();

            return response()->json([
                'status' => 200,
                'message' => "Информация о $playlist->title изменен!",
            ]);
        } catch (\Exception $error) {
            return response()->json([
                'error' => $error->getMessage()
            ]);
        }
    }

    public function store(PlaylistRequest $request): JsonResponse
    {
        try {
            $playlist_image = $request['image'];
            if (!$playlist_image) {
                return response()->json([
                    'status' => 400,
                    'message' => 'Ошибка загрузки картинки!'
                ], 400);
            }
            $playlist_image->storeAs(
                '/public/playlists/avatars',
                $playlist_image->getClientOriginalName()
            );
            $playlist_image = $playlist_image->getClientOriginalName();
            $playlist_image = "http://[::1]:5173/storage/app/public/playlists/avatars/" . $playlist_image;
            $playlist_created = Playlist::create([
                'title' => $request['title'],
                'image' => $playlist_image,
            ]);
            UserPlaylist::create([
                'user_id' => Auth::user()->id,
                'playlist_id' => $playlist_created->id
            ]);

            return response()->json([
                'status' => 200,
                'message' => 'Плейлист создан!',
                'playlist' => $playlist_created,
            ]);
        } catch (\Exception $error) {
            return response()->json([
                'error' => $error->getMessage()
            ]);
        }
    }
    public function delete($id): JsonResponse
    {
        try {
            $playlist = Playlist::find($id);
            $current_user = Auth::user()->id;
            $playlist_creator = $playlist->artists;
            $user_role = Auth::user()->role;
            $user_role = $user_role->id;
            foreach ($playlist_creator as $el) {
                $playlist_creator = $el->id;
            }

            if ($current_user == $playlist_creator || $user_role == 3) {
                Playlist::query()->where('id', $id)->delete();
                return response()->json([
                    'status' => 200,
                    'message' => 'Плейлист удалён!',
                    'playlist' => $playlist,
                ]);
            } else {
                return response()->json([
                    'status' => 200,
                    'message' => 'Вы не создатель данного плейлиста!',
                    'user' => $current_user,
                    'creator' => $playlist_creator
                ]);
            }
        } catch (\Exception $error) {
            return response()->json([
                'error' => $error->getMessage()
            ]);
        }
    }
    public function addSongToPlaylist($id_playlist, $id_song): JsonResponse
    {
        try {
            $playlist = Playlist::find($id_playlist);
            $song = Song::find($id_song);
            $check_song = PlaylistSong::all()->where('song_id', $id_song)->where('playlist_id', $id_playlist)->first();
            if ($check_song !== null) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Песня уже находится в плейлисте!',
                    'playlist' => $playlist
                ]);
            }
            $current_user = Auth::user()->id;
            $playlist_creator = $playlist->artists;
            foreach ($playlist_creator as $el) {
                $playlist_creator = $el->id;
            }
            if ($current_user == $playlist_creator) {
                PlaylistSong::create([
                    'playlist_id' => $playlist->id,
                    'song_id' => $song->id
                ]);
                return response()->json([
                    'status' => 200,
                    'message' => 'Песня успешно добавлена!',
                    'playlist' => $playlist
                ]);
            } else {
                return response()->json([
                    'status' => 200,
                    'message' => 'Вы не создатель данного плейлиста!',
                ]);
            }
        } catch (\Exception $error) {
            return response()->json([
                'error' => $error->getMessage()
            ]);
        }
    }
    public function deleteSongFromPlaylist($id_playlist, $id_song): JsonResponse
    {
        try {
            $playlist = Playlist::find($id_playlist);
            $song = Song::find($id_song);
            $current_user = Auth::user()->id;
            $playlist_creator = $playlist->artists;
            foreach ($playlist_creator as $el) {
                $playlist_creator = $el->id;
            }
            if ($current_user == $playlist_creator) {
                PlaylistSong::query()->where('song_id', $song->id)->delete();
                return response()->json([
                    'status' => 200,
                    'message' => 'Песня успешно удалена!',
                    'playlist' => $playlist
                ]);
            } else {
                return response()->json([
                    'status' => 200,
                    'message' => 'Вы не создатель данного плейлиста!',
                ]);
            }
        } catch (\Exception $error) {
            return response()->json([
                'error' => $error->getMessage()
            ]);
        }
    }
}
