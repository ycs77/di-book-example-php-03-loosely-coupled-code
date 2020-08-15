<?php

namespace App\Contracts\Services;

use Illuminate\Support\Enumerable;

// ---- Code Listing 3.5 ----
interface ProductService
{
    /**
     * Get featured products.
     *
     * @return \Illuminate\Support\Enumerable|\App\DiscountedProduct[]
     */
    public function getFeaturedProducts(): Enumerable;
}
