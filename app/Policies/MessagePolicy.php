<?php

namespace App\Policies;

use App\Enums\UserRole;

class MessagePolicy
{
    public function before()
    {
        return auth()->user()->role === UserRole::ADMIN;
    }

    public function index()
    {
        return $this->before();
    }

    public function show()
    {
        return $this->before();
    }

    public function reply()
    {
        return $this->before();
    }

    public function sendReply()
    {
        return $this->before();
    }

    public function destroy()
    {
        return $this->before();
    }
}
