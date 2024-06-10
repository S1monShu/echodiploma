<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArtistResource extends JsonResource
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
            "is_candidate" => $this->is_candidate,
            "name" => $this->name,
            "image" => $this->image,
            "email" => $this->email,
            "role_id" => $this->role_id,
            "created_at" => Carbon::parse($this->created_at)->translatedFormat('j F Y'),
            "songs" => $this->songs,
            "playlists" => $this->playlists
        ];
    }
}
