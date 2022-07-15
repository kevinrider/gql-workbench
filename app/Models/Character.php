<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Character extends Model
{
    use HasFactory;

    public function friends(): BelongsToMany
    {
        return $this->belongsToMany(Character::class, 'character_friend', 'friend_id');
    }

    public function movies(): BelongsToMany
    {
        return $this->belongsToMany(Movie::class, 'character_movie', 'character_id', 'movie_id');
    }
}
