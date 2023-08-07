<?php

namespace App\Policies;

use App\Enums\UserRole;
use App\Models\Blog;
use App\Models\User;

class BlogPolicy
{
    /**
     * Determine whether the user can view any models.
     */

    public function viewAny(User $user): bool
    {
        $allowedRoles = [UserRole::DEMO, UserRole::EDITOR, UserRole::ADMIN];
        return in_array($user->getRole(), $allowedRoles, true);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Blog $blog): bool
    {
        $allowedRoles = [UserRole::DEMO, UserRole::EDITOR, UserRole::ADMIN];
        return in_array($user->getRole(), $allowedRoles, true);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        $allowedRoles = [UserRole::DEMO, UserRole::EDITOR, UserRole::ADMIN];
        return in_array($user->getRole(), $allowedRoles, true);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Blog $blog): bool
    {
        $allowedRoles = [UserRole::EDITOR, UserRole::ADMIN];
        return in_array($user->getRole(), $allowedRoles, true);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Blog $blog): bool
    {
        return $user->getRole === UserRole::ADMIN;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Blog $blog): bool
    {
        return $user->getRole === UserRole::ADMIN;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Blog $blog): bool
    {
        return $user->getRole === UserRole::ADMIN;
    }
}
