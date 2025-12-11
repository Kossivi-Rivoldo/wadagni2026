<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dons extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_donateur',
        'type_don',
        'montant',
        'quantite',
        'description',
        'moyen_paiement',
        'date',
    ];
}
