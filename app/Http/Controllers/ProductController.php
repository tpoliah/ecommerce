<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $product_data = Product::withPrices()->get();

        return view('pages.default.productspage', compact('product_data'));
        return view('pages.testing.productspage', compact('product_data'));
    }
}
