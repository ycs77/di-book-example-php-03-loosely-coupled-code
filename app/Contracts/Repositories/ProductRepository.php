<?php

namespace App\Contracts\Repositories;

use Illuminate\Support\Enumerable;

// ---- Code Listing 3.7 ----
interface ProductRepository
{
    /**
     * Get featured products.
     *
     * @return \Illuminate\Support\Enumerable|\App\Product[]
     */
    public function getFeaturedProducts(): Enumerable;
}
