<?php

namespace App\ViewModels;

use App\Currency\Money;
use App\DiscountedProduct;
use Cknow\Money\Money as LaravelMoney;

// ---- Code Listing 3.3 ----
class ProductViewModel
{
    public string $name;
    public string $unit_price;

    public function __construct(DiscountedProduct $product)
    {
        $this->name = $product->name;
        $this->unit_price = $this->formatCurrency($product->unit_price);
    }

    protected function formatCurrency(Money $unitPrice): string
    {
        return LaravelMoney::{$unitPrice->currency()->code()}((int) ($unitPrice->amount() * 100))->format();
    }
}
