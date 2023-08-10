<?php

namespace App\Policies;

use App\Models\User;
use App\Enums\UserRole;

class BasePolicy
{
    public function before(User $user): ?bool
    {
        if ($user->getRole() === UserRole::ADMIN) {
            return true;
        }
        return null;
    }

    public function viewAny(User $user): bool
    {
        $allowedRoles = [UserRole::DEMO, UserRole::EDITOR];
        return in_array($user->getRole(), $allowedRoles, true);
    }

    public function destroy(User $user): bool
    {
        return $user->getRole() === UserRole::ADMIN;
    }
}
