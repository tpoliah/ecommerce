<?php

namespace App\Http\Controllers;

use App\Helpers\ShippingHelper;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $group_ids = 1;
        if (Auth::check()) {
            $user = Auth::user();
            $group_ids = $user->getGroups();
        }


        $cart_data = $user->products()->withPrices()->get();
        
        $cart_data->calculateSubtotal();
        
        $shipping_helper = new ShippingHelper();
        
        $shipping_data = $shipping_helper->getGroupShippingOptions($group_ids);
        
        return view('pages.testing.checkoutpage', compact('cart_data', 'shipping_data'));
    }
}
