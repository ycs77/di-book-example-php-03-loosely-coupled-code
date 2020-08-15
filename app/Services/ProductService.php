<?php

namespace App\Services;

use App\Contracts\Repositories\ProductRepository;
use App\Contracts\Services\ProductService as ProductServiceContract;
use App\Contracts\UserContext;
use App\Product;
use Illuminate\Support\Enumerable;

// ---- Code Listing 3.9 ----
class ProductService implements ProductServiceContract
{
    protected ProductRepository $productRepository;
    protected UserContext $userContext;

    public function __construct(ProductRepository $productRepository, UserContext $userContext)
    {
        $this->productRepository = $productRepository;
        $this->userContext = $userContext;
    }

    public function getFeaturedProducts(): Enumerable
    {
        return $this->productRepository
            ->getFeaturedProducts()
            ->map(fn (Product $product) => $product->applyDiscountFor($this->userContext));
    }
}
