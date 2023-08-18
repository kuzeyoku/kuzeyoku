<?php

namespace App\Policies;

use App\Enums\UserRole;

class SettingPolicy extends BasePolicy
{
    public function __construct()
    {
        parent::__construct();
    }

    public function before(): ?bool
    {
        if ($this->userRole === UserRole::ADMIN) {
            return true;
        }
        return null;
    }

    public function index(): bool
    {
        return in_array("settingIndex", $this->permissions, true);
    }

    public function settingUpdate(): bool
    {
        return in_array("settingUpdate", $this->permissions, true);
    }
}
