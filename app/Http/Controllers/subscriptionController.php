<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\User;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Laravel\Cashier\Cashier;
//use Config;
use Stripe;

class subscriptionController extends Controller
{
    public function __construct(){
        \Stripe\Stripe::setApiKey(config('app.stripe.secret'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return \Stripe\Subscription::all(['limit' => 3]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(request $request)
    {   //return $request->id;

        //dd($request);
        return Stripe\Subscription::create([
            //$data= Stripe\Subscription::create([

            "customer" => $request->id,
            "items" => [
              [
                "plan" => $request->plan,
                "quantity" => $request->quantity,
              ],
            ],
          ]);
        //   return Response::json([
        //     $data
        // ], 200);


        //
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function retrieve($id)
    {
        //
        return \Stripe\Subscription::retrieve($id);
    }

    public function update(request $request,$id)
    {
        //return $id;
        $subscription = \Stripe\Subscription::retrieve($id);
       return \Stripe\Subscription::update(

            $id,

                 [ 'cancel_at_period_end' => false,
                    'proration_behavior' => 'always_invoice',
                 'items' => [
                    [
                      'id' => $subscription->items->data[0]->id,
                      'plan' => $request->plan,
                      'quantity' => $request->quantity,
                    ],
                  ],
                  ]
          );




    }





    public function update1(request $request,$id)
    {
        //return $id;
        $subscription = \Stripe\Subscription::retrieve($id);
       return \Stripe\Subscription::update(

            $id,

                 [ 'cancel_at_period_end' => false,
                    'proration_behavior' => 'always_invoice',
                 'items' => [
                    [
                      'id' => $subscription->items->data[0]->id,
                      'plan' => $request->plan1,
                      'quantity' => $request->quantity1,
                    ],
                  ],
                  ]
          );




    }
//testing comment
    public function cancel($id)
    {
        $sub = \Stripe\Subscription::retrieve($id);
        $sub->cancel();
        return $sub;
    }

    public function paymentintent(request $request){
        $stripe_return= \Stripe\Charge::create([
            'amount' => $request->cost2,
            'currency' => 'aud',
            'customer' => $request->customer_id2,
            //'source' => 'src_18eYalAHEMiOZZp1l9ZTjSU0',
          ]);

          $req=User::find($request->userid);




          $mail['id']=$request->userid;
          $mail['name']=$req->name;
          $mail['stripe_id']=$request->customer_id2;
          $mail['invoice']=$stripe_return->id;
          //$mail['invoice_doc']=$request->invoice_doc;
          $mail['cost']=$request->cost2;
          $mail['qty']='1';
          $mail['requestType']=$request->details;
          //$mail['doc_cost']=$request->doc_cost;
          //$mail['doc_qty']=$request->doc_qty;
          //$mail['cost']=$request->cost;
          $mail['email']=$req->email;
          //$data=User::find($request->id);
          $mail['role']=$req->role;
          $mail['link']=$stripe_return->receipt_url;

          Mail::send('mail.paymentIntentInvoice', $mail, function ($message) use ($mail) {
              $message->from('sofroo@sofroo.com.au', 'Uholu');
              $message->subject('Payment Reciept');
              $message->to($mail['email']);
       });









    }

    public function getInvoice($id){
       return \Stripe\Invoice::retrieve(
            $id
          );
    }

    public function retrieveInvoice(request $request,$id){
        $proration_date = time();
        $subscription = \Stripe\Subscription::retrieve($request->subs);
        $items = [
            [
                'id' => $subscription->items->data[0]->id,
                'quantity' => $request->quantity, # Switch to new plan
            ],
        ];


        $invoice= \Stripe\Invoice::upcoming([
            "customer" => $id,
            "subscription" => $request->subs,
            // "invoice_items" => [["quantity" => $request->quantity,
            //                     //"amount"   => $request->amount
            //                 ],
            //                     ],
            "subscription_items" => $items,
            'subscription_proration_date' => $proration_date,
        ]);

        $cost = 0;
        $current_prorations = [];
        foreach ($invoice->lines->data as $line) {
            if ($line->period->start - $proration_date <= 1) {
                array_push($current_prorations, $line);
                $cost += $line->amount;
            }
        }
        if($current_prorations){
        return $current_prorations;
    }
        else{
            return 'same';
        }
        // return $cost;
    }


}
