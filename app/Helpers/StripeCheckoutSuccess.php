<?php

namespace App\Helpers;

use App\Models\Order;
use App\Models\Shipping;
use App\Models\User;

class StripeCheckoutSuccess
{
    protected $stripe;

    public function __construct()
    {
        $this->stripe = StripeClient::getClient();
    }

    public function updateCheckoutOrder($id)
    {
        $session_id = $id;

        $stripe_helper = new StripeCheckout();

        $order = Order::where('payment_id', $session_id)->first();

        if (!$order) {
            return false;
        }
        $session = $stripe_helper->getCheckoutOrder($session_id);

        $user_id = $order->user_id;
        $user = User::findOrFail($user_id);
        $group_ids = $user->getGroups();

        $order_completed_data = $stripe_helper->getOrderCompletedData($session);

        if ($order && $order->payment_status == 'unpaid') {
            $shipping_id = Shipping::where('stripe_id', $order_completed_data['stripe_id'])
            ->get()
            ->first()
            ->id;

            // Update the order record in the database
            $order->subtotal = $order_completed_data['subtotal'];
            $order->total = $order_completed_data['total'];
            $order->shipping_id = $shipping_id;

            $order->payment_status = 'paid';
            $order->save();

            // Remove products from cart
            // $user->products()->detach();

            return true;
        }

        return true;
    }
}
