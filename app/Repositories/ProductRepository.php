<?php

namespace App\Repositories;

use App\Contracts\Repositories\ProductRepository as ProductRepositoryContract;
use App\Product;
use Illuminate\Support\Enumerable;

// ---- Code Listing 3.10 ----
class ProductRepository implements ProductRepositoryContract
{
    public function getFeaturedProducts(): Enumerable
    {
        return Product::where('is_featured', true)->get();
    }
}
