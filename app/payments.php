<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class payments extends Model
{
    //
    public static function addPaymentRecord($user_id, $description, $amount)
    {
        $data=new payments();
        $data->user_id=$user_id;
        $data->description=$description;
        $data->amount=$amount/100;
        $data->save();
    }

    public static function paymentIntent($cost, $user_id, $details)
    {
        $req=User::find($user_id);
        \Stripe\Stripe::setApiKey(config('app.stripe.secret'));
        $stripe_return= \Stripe\Charge::create([
            'amount' => $cost,
            'currency' => 'aud',
            'customer' => $req->stripe_id,
          ]);

          self::addPaymentRecord($user_id, $details, $cost);

          $mail['id']=$user_id;
          $mail['name']=$req->name;
          $mail['stripe_id']=$req->stripe_id;
          $mail['invoice']=$stripe_return->id;
          $mail['cost']=$cost;
          $mail['qty']='1';
          $mail['requestType']=$details;
          $mail['email']=$req->email;
          $mail['role']=$req->role;
          $mail['link']=$stripe_return->receipt_url;

          Mail::send('mail.paymentIntentInvoice', $mail, function ($message) use ($mail) {
              $message->from('sofroo@sofroo.com.au', 'Uholu');
              $message->subject('Payment Reciept');
              $message->to($mail['email']);
       });
    }

    public static function emailScan($scan_id)
    {
        $admins=User::where('role','admin')->get();
        $data=Scan::find($scan_id);
        $mail['id']=$data->id;
        $mail['created_at']=$data->created_at;
        $mail['requestType']='Scan Request';
        $mail['qty']='1';
        $mail['cost']='10';


        foreach($admins as $admin){
                //$data['email']='izhan47@gmail.com';
                $mail['email']=$admin->email;
                //return $data['email'];
                Mail::send('mail.newScanRequest', $mail, function ($message) use ($mail) {
                    $message->from('sofroo@sofroo.com.au', 'Uholu');
                    $message->subject('New Scan Request');
                    $message->to($mail['email']);
            });

            }
    }

}
