<?php

namespace App;

use App\Currency\Money;

// ---- Code Listing 3.6 ----
class DiscountedProduct
{
    public string $name;
    public Money $unit_price;

    public function __construct(string $name, Money $unitPrice)
    {
        $this->name = $name;
        $this->unit_price = $unitPrice;
    }
}
