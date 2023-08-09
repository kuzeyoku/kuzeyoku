<?php

namespace App\Policies;

use App\Enums\UserRole;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class SettingPolicy
{
    public function index(User $user)
    {
        return $user->getRole() === UserRole::ADMIN;
    }

    public function update(User $user)
    {
        return $user->getRole() === UserRole::ADMIN;
    }
}
