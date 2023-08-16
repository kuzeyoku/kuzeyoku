<?php

namespace App\Policies;

use App\Enums\UserRole;
use Illuminate\Database\Eloquent\Model;

class BasePolicy
{
    protected $userRole;
    protected $rolePermissions;

    public function __construct()
    {
        $this->userRole = auth()->user()->role;
        if ($this->userRole !== UserRole::ADMIN->value)
            $this->rolePermissions = json_decode(auth()->user()->permissions);
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
        return in_array("index", $this->rolePermissions, true);
    }

    public function show(): bool
    {
        return in_array("show", $this->rolePermissions, true);
    }

    public function create(): bool
    {
        return in_array("create", $this->rolePermissions, true);
    }

    public function store(): bool
    {
        return in_array("store", $this->rolePermissions, true);
    }

    public function edit(Model $item): bool
    {
        if (isset($item->user_id))
            return in_array("edit", $this->rolePermissions, true) && auth()->user()->id === $item->user_id;
        else
            return in_array("edit", $this->rolePermissions, true);
    }

    public function update(Model $item): bool
    {
        if (isset($item->user_id))
            return in_array("update", $this->rolePermissions, true) && auth()->user()->id === $item->user_id;
        else
            return in_array("update", $this->rolePermissions, true);
    }

    public function destroy(): bool
    {
        return in_array("destroy", $this->rolePermissions, true);
    }
}
