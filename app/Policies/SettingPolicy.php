<?php

namespace App\Policies;

use App\Enums\UserRole;
use Illuminate\Database\Eloquent\Model;

class SettingPolicy extends BasePolicy
{
    public function update(Model $model): bool
    {
        return auth()->user()->role === UserRole::ADMIN;
    }
}
