<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Artiste extends Model
{
    use HasFactory;

    public function spectacles(): BelongsTo
    {
        return $this->belongsTo(Spectacle::class);
    }

    public function representations() : BelongsToMany
    {
        return $this->BelongsToMany(Representation::class);
    }
}
