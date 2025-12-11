<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Benevoles extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_complet',
        'email',
        'numero',
        'region',
        'experience',
    ];
}
