<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Spectacle extends Model
{
    use HasFactory;

    public function artistes() : HasMany
    {
        return $this->hasMany(Artiste::class);
    }
    public function representations() : BelongsToMany
    {
        return $this->BelongsToMany(Spectacle::class,'representation_spectacle')->withTimestamps();
    }
}
