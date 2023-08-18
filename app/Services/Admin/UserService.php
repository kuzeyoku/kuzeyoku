<?php

namespace App\Services\Admin;

use App\Enums\ModuleEnum;
use App\Enums\UserRole;
use App\Models\User;

class UserService extends BaseService
{
    protected $folder;
    protected $route;

    public function __construct(User $user)
    {
        parent::__construct($user, ModuleEnum::User);
    }

}
