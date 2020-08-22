<?php

namespace App;

use App\Casts\Money as MoneyCast;
use App\Contracts\UserContext;
use App\Currency\Money;
use Illuminate\Database\Eloquent\Model;

// ---- Code Listing 3.8 ----
/**
 * @property \App\Currency\Money $unit_price
 */
class Product extends Model
{
    protected $fillable = [
        'name', 'description', 'unit_price', 'is_featured',
    ];

    protected $casts = [
        'unit_price' => MoneyCast::class,
        'is_featured' => 'boolean',
    ];

    public function withUnitPrice(Money $money)
    {
        $this->unit_price = $money;

        return $this;
    }

    public function applyDiscountFor(UserContext $userContext): DiscountedProduct
    {
        $discount = $userContext->isPreferredCustomer() ? 0.95 : 1;
        $unitPrice = $this->unit_price->calcAmount(fn (float $amount) => $amount * $discount);

        return new DiscountedProduct($this->name, $unitPrice);
    }
}
