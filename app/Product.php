<?php

namespace App;

use App\Contracts\UserContext;
use Illuminate\Database\Eloquent\Model;

// ---- Code Listing 3.8 ----
class Product extends Model
{
    protected $fillable = [
        'name', 'description', 'unit_price', 'is_featured',
    ];

    protected $casts = [
        'unit_price' => 'float',
        'is_featured' => 'boolean',
    ];

    public function applyDiscountFor(UserContext $userContext): DiscountedProduct
    {
        $discount = $userContext->isPreferredCustomer() ? 0.95 : 1;

        return new DiscountedProduct($this->name, $this->unit_price * $discount);
    }
}
