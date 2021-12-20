<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Stripe\Stripe\StripeClient;

class StripeController extends Controller
{
    public function payouts()
    {
        $stripe = new \Stripe\StripeClient(
            'sk_test_51K4TMcHwKAeSF2LuJ7WZLrLCPv0Kjz5Pxz9eKiDKV4efnf04I3oI60RF54XdCWxy8KRNwYt1lw6djcrO6a70PPBN00gzSfE7P6'
        );
        $stripe->payouts->create([
            'amount' => 1100,
            'currency' => 'jpy',
        ]);
    }

    public function balance()
    {
        $stripe = new \Stripe\StripeClient(
            'sk_test_51K4TMcHwKAeSF2LuJ7WZLrLCPv0Kjz5Pxz9eKiDKV4efnf04I3oI60RF54XdCWxy8KRNwYt1lw6djcrO6a70PPBN00gzSfE7P6'
        );
        $stripe->balance->retrieve();
    }

    public function charges()
    {
        $stripe = new \Stripe\StripeClient(
            'sk_test_51K4TMcHwKAeSF2LuJ7WZLrLCPv0Kjz5Pxz9eKiDKV4efnf04I3oI60RF54XdCWxy8KRNwYt1lw6djcrO6a70PPBN00gzSfE7P6'
        );
        $stripe->charges->create([
        'amount' => 2000,
        'currency' => 'jpy',
        'source' => 'tok_mastercard',
        'description' => 'My First Test Charge (created for API docs)'
        ]);
    }

    public function getcharges()
    {
        $stripe = new \Stripe\StripeClient(
            'sk_test_51K4TMcHwKAeSF2LuJ7WZLrLCPv0Kjz5Pxz9eKiDKV4efnf04I3oI60RF54XdCWxy8KRNwYt1lw6djcrO6a70PPBN00gzSfE7P6'
        );
        $items = $stripe->charges->all(['limit' => 3]);
        return $items;
    }

    public function payment_methods()
    {
        $stripe = new \Stripe\StripeClient(
            'sk_test_51K4TMcHwKAeSF2LuJ7WZLrLCPv0Kjz5Pxz9eKiDKV4efnf04I3oI60RF54XdCWxy8KRNwYt1lw6djcrO6a70PPBN00gzSfE7P6'
        );
        $payment_methods = $stripe->paymentMethods->create([
            'type' => 'card',
            'card' => [
                'number' => '4242424242424242',
                'exp_month' => 12,
                'exp_year' => 2022,
                'cvc' => '314',
            ],
        ]);
    }
    
    public function payment_intents()
    {
        $stripe = new \Stripe\StripeClient(
            'sk_test_51K4TMcHwKAeSF2LuJ7WZLrLCPv0Kjz5Pxz9eKiDKV4efnf04I3oI60RF54XdCWxy8KRNwYt1lw6djcrO6a70PPBN00gzSfE7P6'
        );
        $payment_methods = $stripe->paymentMethods->create([
            'type' => 'card',
            'card' => [
                'number' => '4242424242424242',
                'exp_month' => 12,
                'exp_year' => 2022,
                'cvc' => '314',
            ],
        ]);
        $stripe->paymentIntents->create([
            'amount' => 2000,
            'currency' => 'jpy',
            'payment_method_types' => ['pm_1K6FH7HwKAeSF2LuC4NJ9WJV'],
          ]);
    }
}
