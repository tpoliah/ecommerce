<?php

namespace App\Http\Controllers;

use App\Helpers\ShippingHelper;
use App\Helpers\StripeCheckout;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CheckoutPaymentController extends Controller
{
    public function index($payment)
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
            // dd('Cart is empty');
        }

        switch ($payment) {
            case 'stripe':
                $stripe_checkout->startCheckoutSession();
                $stripe_checkout->addEmail($user->email);
                $stripe_checkout->addProducts($cart_data);
                $stripe_checkout->enablePromoCodes();
                $shipping_data = $shipping_helper->getGroupShippingOptions();
                $stripe_checkout->addShippingOptions($shipping_data);
                $stripe_checkout->createSession();
                $insert_data = $stripe_checkout->getOrderCreateData();

                $completed = true;

                break;

            default:
                // code...
                $insert_data = [
                    'payment_provider' => 'testing',
                    'payment_id' => 'testing',
                ];
                $completed = true;
                break;
        }

        if (!$completed && empty($insert_data)) {
            dd('Payment incomplete or checkout data is missing');
        }

        $order->user_id = $user->id;
        $order->order_no = 'ORD-2024-'.Str::random(6);
        $order->subtotal = $cart_data->getSubtotal();
        $order->total = $cart_data->getTotal();
        $order->payment_provider = $insert_data['payment_provider'];
        $order->payment_id = $insert_data['payment_id'];
        $order->shipping_id = 1;
        $order->shipping_address_id = 1;
        $order->billing_address_id = 1;
        $order->payment_status = 'unpaid';
        $order->save();

        $records = [];
        foreach ($cart_data as $data) {
            array_push($records,
                new OrderProduct([
                    'product_id' => $data->id,
                    'user_id' => $user->id,
                    'price' => $data->getPrice(),
                    'quantity' => $data->pivot->quantity,
                ]));
        }

        $order->order_products()->saveMany($records);

        if ($payment == 'stripe') {
            return redirect($stripe_checkout->getUrl());
        }

        dd('Payment Successful during test');
    }
}
