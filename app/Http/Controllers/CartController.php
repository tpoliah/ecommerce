<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $cart_data = $user->products()->withPrices()->get();
        $cart_data->calculateSubtotal();

        //  dd($cart_data);

        return view('pages.testing.cartpage', compact('cart_data'));
    }
}
