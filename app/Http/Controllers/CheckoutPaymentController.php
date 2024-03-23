<?php

namespace App\Http\Controllers;

use App\Helpers\ShippingHelper;
use App\Helpers\StripeCheckout;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class CheckoutPaymentController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $shipping_helper = new ShippingHelper();
        $stripe_checkout = new StripeCheckout();
        $order = new Order();
        $insert_data = [];
        $completed = false;

        $cart_data = $user->products()->withPrices()->get();

        $cart_data->calculateSubtotal();

        if ($cart_data->isEmpty()) {
            dd('Cart is empty');
        }
    }
}
