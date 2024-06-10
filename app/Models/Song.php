<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Song extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'is_application',
        'agree_application',
        'popularity',
        'song_url',
        'image'
    ];

    // Жанры трека
    public function genres(): BelongsToMany
    {
        return $this->belongsToMany(Genre::class, 'genre_songs');
    }

    // Исполнители трека
    public function artists(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_songs');
    }

    public function playlists(): BelongsToMany
    {
        return $this->belongsToMany(Playlist::class, 'playlist_songs');
    }

    // TF_IDF TERM FREQUENCY
    public function getTermFrequency($feature): float|int
    {
        $featureCount = $this->genres()->count();
        $featureSongsCount = $feature->songs()->count();

        if ($featureCount == 0 || $featureSongsCount == 0) {
            return 0;
        }

        return $this->genres()
            ->wherePivot('genre_id', $feature->id)
            ->count() / $featureCount;
    }
}
