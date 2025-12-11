<?php

namespace App\Policies;

use App\Models\Benevole;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BenevolePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->role === 'admin';
    }

    public function view(User $user, Benevole $benevole)
    {
        return $user->role === 'admin';
    }

    public function create(User $user)
    {
        return false; // lecture seule
    }

    public function update(User $user, Benevole $benevole)
    {
        return false;
    }

    public function delete(User $user, Benevole $benevole)
    {
        return false;
    }
}
