<?php

// Method for payment with Stripe
// Card number is 4242 4242 4242 4242 for testing
// The other fields can be anything
function stripe_payment($data){
    \Stripe\Stripe::setApiKey('sk_test_v0nUOghsTrWY18t6OEHoRtQW');
    $customer = \Stripe\Customer::create(array(
        "email" => $data['email'],
        "source" => $data['token']
    ));

    $charge = \Stripe\Charge::create(array(
        "amount" => $data['amount'] * 100,
        "currency" => "eur",
        "description" => $data['description'],
        "customer" => $customer->id
    ));
    if($charge->status === 'succeeded'){
        return true;
    }
    return false;
}
