<?php

namespace App\Contracts\Currency;

use App\Currency\Currency;

interface Currencyable
{
    public function getCurrency(): Currency;
}
