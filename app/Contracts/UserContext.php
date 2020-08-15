<?php

namespace App\Contracts;

// ---- Code Listing 3.9 ----
interface UserContext
{
    public function isPreferredCustomer(): bool;
}
