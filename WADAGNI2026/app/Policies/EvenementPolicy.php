<?php

namespace App\Policies;

use App\Models\Evenement;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EvenementPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return in_array($user->role, ['admin', 'editeur']);
    }

    public function view(User $user, Evenement $evenement)
    {
        return in_array($user->role, ['admin', 'editeur']);
    }

    public function create(User $user)
    {
        return in_array($user->role, ['admin', 'editeur']);
    }

    public function update(User $user, Evenement $evenement)
    {
        return in_array($user->role, ['admin', 'editeur']);
    }

    public function delete(User $user, Evenement $evenement)
    {
        return in_array($user->role, ['admin', 'editeur']);
    }
}
