<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $product_data = Product::withPrice()->get();
        

        return view('pages.testing.cartpage', compact('product_data'));
    }
}
