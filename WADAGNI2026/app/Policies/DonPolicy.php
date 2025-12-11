<?php

namespace App\Policies;

use App\Models\Don;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DonPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->role === 'admin';
    }

    public function view(User $user, Don $don)
    {
        return $user->role === 'admin';
    }

    public function create(User $user)
    {
        return false;
    }

    public function update(User $user, Don $don)
    {
        return false;
    }

    public function delete(User $user, Don $don)
    {
        return false;
    }
}
