<?php

namespace App\Models\Relations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenreSong extends Model
{
    use HasFactory;

    protected $fillable = [
      'genre_id',
      'song_id'
    ];
}
