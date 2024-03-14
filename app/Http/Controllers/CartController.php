<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $cart_data = $user->products()->withPrices()->get();
        $cart_data->calculateSubtotal();

        //  dd($cart_data);

        return view('pages.default.cartpage', compact('cart_data'));
    }

    public function store(Request $request)
    {
        Cart::updateOrCreate(
            ['user_id' => Auth::id(), 'product_id' => $request->product_id],
            ['quantity' => DB::raw('quantity + '.$request->quantity), 'updated_at' => now()]
        );

        return redirect()->route('cart.index')->with('message', 'Product added to cart');
    }

    public function addToCartFromStore(Request $request)
    {
        Cart::updateOrCreate(
            ['user_id' => Auth::id(), 'product_id' => $request->id],
            ['quantity' => DB::raw('quantity + '. 1), 'updated_at' => now()]
        );

        return redirect()->route('cart.index')->with('message', 'Product added to cart');
    }

    public function destroy(Request $request)
    {
        Cart::destroy($request->id);

        // Cart::where('id', $request->id)
        // ->where('user_id', Auth::id())
        // ->delete();

        return redirect()->route('cart.index')->with('message', 'Product removed from cart');
    }
}
