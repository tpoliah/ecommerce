<?php

namespace App\Http\Controllers;

use App\Models\Product;

class DetailController extends Controller
{
    public function index($id)
    {
        $data = Product::singleProduct($id)->withPrices()->get()->first();

        $currentProduct = Product::findOrFail($id);

        $relatedProducts = Product::where('quantity', '>', 0)
            ->where('id', '!=', $id)
            ->inRandomOrder()
            ->take(4)
            ->get();

        return view('pages.default.detailspage', compact('data', 'relatedProducts', 'currentProduct'));

        return view('pages.testing.detailspage', compact('data', 'relatedProducts', 'currentProduct'));
    }
}
