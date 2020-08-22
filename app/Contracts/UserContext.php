<?php

namespace App\Contracts;

use App\Currency\Currency;

// ---- Code Listing 3.9 ----
interface UserContext
{
    public function isPreferredCustomer(): bool;

    public function currency(): Currency;
}
