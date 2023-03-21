<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Player extends Model
{
    use HasFactory;

    public function battles(): BelongsToMany
    {
        return $this->belongsToMany(Battle::class);
    }

    public function decks(): BelongsToMany
    {
        return $this->belongsToMany(Deck::class);
    }
}
