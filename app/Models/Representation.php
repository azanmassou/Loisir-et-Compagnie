<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Representation extends Model
{
    use HasFactory;

    public function salles() : HasMany
    {
        return $this->hasMany(Salle::class);
    }

    public function spectacles() : BelongsToMany
    {
        return $this->BelongsToMany(Spectacle::class);
    }
    public function artists() : BelongsToMany
    {
        return $this->BelongsToMany(Artiste::class);
    }

    public function tickets() : BelongsToMany
    {
        return $this->BelongsToMany(Ticket::class);
    }

}
