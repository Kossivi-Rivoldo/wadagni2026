<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'role',
        'nom',
        'fonction',
        'email',
        'password',
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

     // Un user peut créer plusieurs événements
    public function evenements()
    {
        return $this->hasMany(Evenement::class, 'id_user');
    }

    // Un user peut créer plusieurs catégories d'articles
    public function categorieArticles()
    {
        return $this->hasMany(ArticleCat::class, 'id_user');
    }

    // Un user peut créer plusieurs articles
    public function articles()
    {
        return $this->hasMany(Article::class, 'id_user');
    }
}
