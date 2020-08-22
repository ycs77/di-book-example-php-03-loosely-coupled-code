<?php

namespace App\Contracts\Currency;

use App\Currency\Currency;
use App\Currency\Money;

// ---- Code Listing 4.6 ----
interface CurrencyConverter
{
    public function exchange(Money $money, Currency $targetCurrency): Money;
}
