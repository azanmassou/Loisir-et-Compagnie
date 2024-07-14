<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Salle extends Model
{
    use HasFactory;


    protected $fillable =
    [
        'TypeSalle',
        'Capacite',
        'representation_id'
    ];

    public function representation(): BelongsTo
    {
        return $this->belongsTo(Representation::class);
    }
}
