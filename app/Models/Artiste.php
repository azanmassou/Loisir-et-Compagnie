<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Artiste extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'NomArtiste',
        'spectacle_id'
    ];

    public function spectacle(): BelongsTo
    {
        return $this->belongsTo(Spectacle::class);
    }

    public function representations() : BelongsToMany
    {
        return $this->BelongsToMany(Representation::class);
    }
}
