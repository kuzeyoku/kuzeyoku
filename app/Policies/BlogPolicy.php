<?php

namespace App\Policies;

use App\Enums\UserRole;
use App\Models\Blog;
use App\Models\User;

class BlogPolicy extends BasePolicy
{

    public function edit(User $user, Blog $blog): bool
    {
        if ($user->getRole() === UserRole::EDITOR) {
            return $user->id === $blog->user_id;
        }
        return false;
    }

    public function update(User $user, Blog $blog): bool
    {
        if ($user->getRole() === UserRole::EDITOR) {
            return $user->id === $blog->user_id;
        }
        return false;
    }
}
