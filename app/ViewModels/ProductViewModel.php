<?php

namespace App\ViewModels;

use Cknow\Money\Money;

// ---- Code Listing 3.3 ----
class ProductViewModel
{
    public string $name;
    public string $unit_price;

    public function __construct(string $name, string $unitPrice)
    {
        $this->name = $name;
        $this->unit_price = Money::TWD($unitPrice * 100)->format();
    }
}
