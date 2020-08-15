<?php

namespace App;

// ---- Code Listing 3.6 ----
class DiscountedProduct
{
    public string $name;
    public float $unit_price;

    public function __construct(string $name, float $unitPrice)
    {
        $this->name = $name;
        $this->unit_price = $unitPrice;
    }
}
