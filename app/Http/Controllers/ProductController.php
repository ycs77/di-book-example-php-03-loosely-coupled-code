<?php

namespace App\Http\Controllers;

use App\ViewModels\ProductViewModel;

class ProductController extends Controller
{
    public function index()
    {
        $products = collect([
            new ProductViewModel('巧克力', 20),
            new ProductViewModel('蘋果', 20),
        ]);

        return view('products.index', [
            'products' => $products,
        ]);
    }
}
