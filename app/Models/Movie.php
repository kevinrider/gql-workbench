<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Movie extends Model
{
    use HasFactory;

    public function characters(): BelongsToMany
    {
        return $this->belongsToMany(Character::class, 'character_movie', 'movie_id', 'character_id');
    }
}
