<?php

namespace App\ViewModels;

use App\DiscountedProduct;
use Cknow\Money\Money;

// ---- Code Listing 3.3 ----
class ProductViewModel
{
    public string $name;
    public string $unit_price;

    public function __construct(DiscountedProduct $product)
    {
        $this->name = $product->name;
        $this->unit_price = Money::TWD($product->unit_price * 100)->format();
    }
}
