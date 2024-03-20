<?php

namespace App\Helpers;

class SubscriptionHelper
{
    protected $stripe;

    public function __construct()
    {
        $this->stripe = StripeClient::getClient();
    }

    // NOTE: TO CHANGE SPELLING HERE AND INSIDE SUBSCRIPTION CONTROLLER
    public function createSubscriptonCheckout($email)
    {
        // Source: https://stripe.com/docs/billing/quickstart?lang=php

        $YOUR_DOMAIN = url('');

        // try {
        $prices = $this->stripe->prices->all([
          // retrieve lookup_key from form data POST body
          'lookup_keys' => [$_POST['lookup_key']],
          'expand' => ['data.product'],
        ]);

        $checkout_session = $this->stripe->checkout->sessions->create([
          'customer_email' => $email,
          'line_items' => [[
            'price' => $prices->data[0]->id,
            'quantity' => 1,
          ]],
          'mode' => 'subscription',
          'success_url' => $YOUR_DOMAIN.'/subscriptions/success/{CHECKOUT_SESSION_ID}',
          'cancel_url' => $YOUR_DOMAIN.'/subscriptions',
        ]);
        // } catch (\Error $e) {
        //     http_response_code(500);
        //     echo json_encode(['error' => $e->getMessage()]);
        // }

        return $checkout_session;
    }

    public function getCheckoutOrder($session_id)
    {
        return $this->stripe->checkout->sessions->retrieve($session_id, []);
    }

    public function getSubscription($id)
    {
        return $this->stripe->subscriptions->retrieve($id, []);
    }

    public function updateSubscription(string $id, bool $status)
    {
        return $this->stripe->subscriptions->update($id, ['cancel_at_period_end' => $status]);
    }
}
