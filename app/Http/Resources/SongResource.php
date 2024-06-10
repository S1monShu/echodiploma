<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SongResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "title" => $this->title,
            "is_application" => $this->is_application,
            "agree_application" => $this->agree_application,
            "popularity" => $this->popularity,
            "song_url" => $this->song_url,
            "image" => $this->image,
            "created_at" => Carbon::parse($this->created_at)->translatedFormat('j F Y'),
            "genres" => $this->genres,
            "artists" => $this->artists
        ];
    }
}
