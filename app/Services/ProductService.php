<?php

namespace App\Services;

use App\Contracts\Currency\CurrencyConverter;
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
    protected CurrencyConverter $currencyConverter;

    public function __construct(
        ProductRepository $productRepository,
        UserContext $userContext,
        CurrencyConverter $currencyConverter)
    {
        $this->productRepository = $productRepository;
        $this->userContext = $userContext;
        $this->currencyConverter = $currencyConverter;
    }

    public function getFeaturedProducts(): Enumerable
    {
        $userCurrency = $this->userContext->currency();

        return $this->productRepository
            ->getFeaturedProducts()
            ->map(fn (Product $product) => $product
                ->convertTo($userCurrency, $this->currencyConverter)
                ->applyDiscountFor($this->userContext));
    }
}
