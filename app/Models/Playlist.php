<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Playlist extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'image'
    ];

    public function songs(): BelongsToMany
    {
        return $this->belongsToMany(Song::class, 'playlist_songs');
    }

    public function artists(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_playlists');
    }
}
