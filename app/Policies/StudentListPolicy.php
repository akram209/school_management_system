<?php

namespace App\Policies;

use App\Models\User;

class StudentListPolicy
{
    /**
     * Create a new policy instance.
     */
    public function list(User $user)
    {
        return $user->role == 'student';
    }
}
