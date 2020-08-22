<?php

namespace App\Currency;

use Money\Currency as PHPCurrency;

// ---- Code Listing 4.6 ----
class Currency
{
    protected string $code;

    public function __construct(string $code)
    {
        $this->code = $code;
    }

    public function toPHPCurrency(): PHPCurrency
    {
        return new PHPCurrency($this->code());
    }

    public function code()
    {
        return $this->code;
    }
}
