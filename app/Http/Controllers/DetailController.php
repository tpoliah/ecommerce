<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index($id)
    {

        $data = Product::singleProduct($id)->withPrices()->get()->first();

        return view('pages.default.detailspage', compact('data'));
        return view('pages.testing.detailspage', compact('data'));
    }
}
