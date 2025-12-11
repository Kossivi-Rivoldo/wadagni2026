<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article_cats extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_cat';

    protected $fillable = [
        'nom_cat',
        'id_user',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function articles()
    {
        return $this->hasMany(Article::class, 'id_cat');
    }
}
