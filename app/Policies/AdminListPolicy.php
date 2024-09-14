<?php

namespace App\Policies;

use App\Models\User;

class AdminListPolicy
{
    /**
     * Create a new policy instance.
     */
    public function list(User $user)
    {
        return $user->role == 'admin';
    }
}
