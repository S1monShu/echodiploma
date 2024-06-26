<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Genre extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'popularity',
        'image',
    ];

    // Треки с данным жанром
    public function songs(): BelongsToMany
    {
        return $this->belongsToMany(Song::class, 'genre_songs');
    }
}
