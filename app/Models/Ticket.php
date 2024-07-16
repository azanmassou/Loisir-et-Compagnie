<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'Libelle', // Ex: Réservation, Place assise, Place debout, etc.
        'Montant', // Prix du ticket pour ce type
    ];

    public function representations()
    {
        return $this->belongsToMany(Representation::class, 'ticket_representation')
        ->withPivot('Nbticket','Montant')
                    ->withTimestamps();
    }
}
