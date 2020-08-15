<?php

namespace App\Contexts;

use App\Contracts\UserContext as UserContextContract;
use App\User;
use Illuminate\Contracts\Auth\Factory as Auth;

// ---- Code Listing 3.12 ----
class UserContext implements UserContextContract
{
    protected Auth $auth;

    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    public function isPreferredCustomer(): bool
    {
        return optional($this->user())->is_preferred_customer ?? false;
    }

    protected function user(): ?User
    {
        return $this->auth->guard()->user();
    }
}
