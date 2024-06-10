<?php

namespace App\Http\Controllers;

use App\Http\Resources\SongResource;
use App\Http\Resources\GenreResource;
use App\Models\Genre;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;

class GenreController extends Controller
{

    public function index(): JsonResponse
    {
        $genres = Genre::orderBy('popularity', 'desc')->get();
        if (!$genres->first()) {
            return response()->json([
                'status' => 404,
                'error' => 'Жанры отсутствуют!'
            ], 404);
        }

        return response()->json([
            'status' => 200,
            'genres' => GenreResource::collection($genres)
        ]);
    }

    public function show(int $id): JsonResponse
    {
        $genre = Genre::find($id);
        if (!$genre) {
            return response()->json([
                'status' => 404,
                'error' => 'Такого жанра не существует!'
            ], 404);
        }

        return response()->json([
            'status' => 200,
            'genre' => [
                'id' => $genre->id,
                'title' => $genre->title,
                'popularity' => $genre->popularity,
                'image' => $genre->image,
                "created_at" => Carbon::parse($genre->created_at)->translatedFormat('j F Y'),
                'songs' => SongResource::collection($genre->songs),
            ]
        ]);
    }
}
