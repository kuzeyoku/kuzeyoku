<?php

namespace App\Policies;

use App\Enums\UserRole;

class UserPolicy
{
    public function before()
    {
        if (auth()->user()->role === UserRole::ADMIN) {
            return true;
        }
        return false;
    }
}
