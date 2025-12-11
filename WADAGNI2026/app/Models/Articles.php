<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_art';

    protected $fillable = [
        'id_cat',
        'titre_art',
        'extr_art',
        'image',
        'contenu',
        'id_user',
        'video',
    ];

    public function categorie()
    {
        return $this->belongsTo(Article_cats::class, 'id_cat');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
