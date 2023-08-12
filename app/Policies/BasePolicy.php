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

    public function index(User $user): bool
    {
        $allowedRoles = [UserRole::DEMO, UserRole::EDITOR];
        return in_array($user->getRole(), $allowedRoles, true);
    }

    public function show(User $user): bool
    {
        $allowedRoles = [UserRole::DEMO, UserRole::EDITOR];
        return in_array($user->getRole(), $allowedRoles, true);
    }

    public function store(User $user): bool
    {
        return $user->getRole() === UserRole::ADMIN;
    }

    public function edit(User $user): bool
    {
        return $user->getRole() === UserRole::ADMIN;
    }

    public function update(User $user): bool
    {
        return $user->getRole() === UserRole::ADMIN;
    }

    public function destroy(User $user): bool
    {
        return $user->getRole() === UserRole::ADMIN;
    }
}
