<?php

namespace App\Http\Controllers;

use App\Contracts\Services\ProductService;
use App\DiscountedProduct;
use App\ViewModels\ProductViewModel;

// ---- Code Listing 3.4 ----
class ProductController extends Controller
{
    protected ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $products = $this->productService
            ->getFeaturedProducts()
            ->map(fn (DiscountedProduct $product) => new ProductViewModel($product));

        return view('products.index', [
            'products' => $products,
        ]);
    }
}
