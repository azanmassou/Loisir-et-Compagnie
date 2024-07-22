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

    public function artists() : BelongsToMany
    {
        return $this->BelongsToMany(Artiste::class);
    }

    public function tickets()
    {
        return $this->belongsToMany(Ticket::class, 'ticket_representation')
        ->withPivot('Nbticket','Montant')
                    ->withTimestamps();
    }
    public function spectacles()

    {
        return $this->belongsToMany(Spectacle::class, 'representation_spectacle')
                    ->withTimestamps();
    }

}
