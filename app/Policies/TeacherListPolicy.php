<?php

namespace App\Policies;

use App\Models\User;

class TeacherListPolicy
{
    /**
     * Create a new policy instance.
     */
    public function list(User $user)
    {
        return $user->role == 'teacher';
    }
}
