<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PlaylistResource extends JsonResource
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
            "image" => $this->image,
            "created_at" => Carbon::parse($this->created_at)->translatedFormat('j F Y'),
            "songs" => $this->songs,
            'artists' => $this->artists
        ];
    }
}
