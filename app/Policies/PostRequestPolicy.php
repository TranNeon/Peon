<?php

namespace App\Policies;

use App\Models\User;
use App\UserRole;

class PostRequestPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function review(User $user) :bool
    {
        return !(auth()->user()->role === UserRole::USER);

    }
}
