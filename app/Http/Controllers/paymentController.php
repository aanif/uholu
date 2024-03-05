<?php

namespace App\Http\Controllers;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Laravel\Cashier\Cashier;
use Config;


class paymentController extends Controller
{
    public function __construct(){
        \Stripe\Stripe::setApiKey(config('app.stripe.secret'));
    }


 public function index(request $request){
  return  \Stripe\PaymentMethod::all([
        'customer' => $request->cus_id,
        'type' => $request->cardtype,
      ]);

 }

 public function create(request $request){
   return \Stripe\PaymentMethod::create([
        'type' => $request->cardtype,
        'card' => [
          'number' => $request->cardnumber,
          'exp_month' => $request->expmonth,
          'exp_year' => $request->expyear,
          'cvc' => $request->cvc,
        ]
      ]);

 }

 public function retrieve($id)
 {
    return \Stripe\PaymentMethod::retrieve($id);
 }

public function update(request $request,$id)
{
    return \Stripe\PaymentMethod::update(
        $id,
        //'type' => $request->cardtype,
        ['card' => [
            'number' => $request->cardnumber,
            'exp_month' => $request->expmonth,
            'exp_year' => $request->expyear,
            'cvc' => $request->cvc,
        ],
        ]
    );

}

public function attachpayment(request $request,$id)
{
    $payment_method = \Stripe\PaymentMethod::retrieve($id);
    $payment_method->attach([
        'customer' => $request->cus_id,
        invoice_settings.default_payment_method
    ]);
    return $payment_method;

}

public function detachpayment($id)
{
    $payment_method = \Stripe\PaymentMethod::retrieve($id);
$payment_method->detach();
return $payment_method;
}




    //
}
