<?php

namespace App\Models\Relations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavouriteSong extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'song_id'
    ];
}
