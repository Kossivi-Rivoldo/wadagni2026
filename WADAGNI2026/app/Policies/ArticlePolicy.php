<?php

namespace App\Policies;

use App\Models\Article;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArticlePolicy
{
    use HandlesAuthorization;

    /**
     * Détermine si l'utilisateur peut voir la liste des articles
     */
    public function viewAny(User $user)
    {
        return in_array($user->role, ['admin', 'editeur']);
    }

    /**
     * Détermine si l'utilisateur peut voir un article spécifique
     */
    public function view(User $user, Article $article)
    {
        return in_array($user->role, ['admin', 'editeur']);
    }

    /**
     * Détermine si l'utilisateur peut créer un article
     */
    public function create(User $user)
    {
        return in_array($user->role, ['admin', 'editeur']);
    }

    /**
     * Détermine si l'utilisateur peut mettre à jour un article
     */
    public function update(User $user, Article $article)
    {
        return in_array($user->role, ['admin', 'editeur']);
    }

    /**
     * Détermine si l'utilisateur peut supprimer un article
     */
    public function delete(User $user, Article $article)
    {
        return in_array($user->role, ['admin', 'editeur']);
    }

    /**
     * Pas besoin pour les autres méthodes (restore, forceDelete) mais peuvent être ajoutées si nécessaire
     */
}
