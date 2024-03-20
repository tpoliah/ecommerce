<?php

namespace App\Http\Controllers\subscriptions;

use App\Helpers\SubscriptionHelper;
use App\Http\Controllers\Controller;
use App\Models\subscriptions\Subscription;
use App\Models\subscriptions\SubscriptionOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    public function index()
    {
        $subscription_data = Subscription::all();

        return view('pages.default.subscriptions-view', compact('subscription_data'));
    }

    public function purchase(Request $request, $subscription_id)
    {
        // Get user
        $user = Auth::user();

        // Get to see if user is already subscribed

        try {
            // code...

            $subscription_helper = new SubscriptionHelper();
            // For testing, subscription id is 4
            $subscription_group_id = 4;
            $checkout_session = $subscription_helper->createSubscriptonCheckout($user->email);

            $order = new SubscriptionOrder();
            $order->user_id = $user->id;
            $order->subscription_id = $subscription_id;
            $order->group_id = $subscription_group_id;
            $order->checkout_id = $checkout_session->id;
            $order->payment_status = 'pending_payment';
            $order->save();

            return true;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function success($id)
    {
        return true;
    }

    public function addSubscriptionPurchased($checkout_id)
    {
        try {
            return true;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
