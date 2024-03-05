<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class Delivery extends Model
{
    //
    protected $fillable = [
        'customer_id','customer_id_stripe', 'keys', 'docs', 'unit','street', 'city','zip','info','cost',
    ];

    public function user()
    {
        return $this->belongsTo('App\User','customer_id');
    }

    public static function emailDelivery($delivery_id)
    {
        $da=Delivery::where('id',$delivery_id)->first();
        $user=User::where('id',$da->customer_id)->first();

         $data['name'] = $da->name;
         $data['id'] = $da->id;
         $data['cost'] = $da->cost;
         $data['unit'] = $da->unit;
         $data['street'] = $da->street;
         $data['city'] = $da->city;
         $data['zip'] = $da->zip;
         $data['info'] = $da->info;
         $data['created_at'] = $da->created_at;
         $data['keys'] = json_decode($da->keys);
         $data['docs'] = json_decode($da->docs);
        $data['email']=$user->email;

        Mail::send('mail.delorder', $data, function ($message) use ($data) {
            $message->from('sofroo@sofroo.com.au', 'Uholu');
            $message->subject('Your Delivery Request');
            $message->to($data['email']);
     });


            return;
    }

    public static function adminEmailDelivery($delivery_id)
    {
        $da=Delivery::where('id',$delivery_id)->first();
        $admins=User::where('role','admin')->get();

         $data['name'] = $da->name;
         $data['id'] = $da->id;
         $data['cost'] = $da->cost;
         $data['unit'] = $da->unit;
         $data['street'] = $da->street;
         $data['city'] = $da->city;
         $data['zip'] = $da->zip;
         $data['info'] = $da->info;
         $data['created_at'] = $da->created_at;
         $data['type']= $da->type;
         $data['keys'] = json_decode($da->keys);
         $data['docs'] = json_decode($da->docs);
        foreach($admins as $admin){
        $data['email']=$admin->email;
        Mail::send('mail.newdelrequest', $data, function ($message) use ($data) {
            $message->from('sofroo@sofroo.com.au', 'Uholu');
            $message->subject('New delivery Request');
            $message->to($data['email']);
     });

    }
            return;
    }


    public static function deliveredEmail($delivery_id)
    {
        $da=Delivery::where('id',$delivery_id)->first();
        $user=User::where('id',$da->customer_id)->first();

         $data['name'] = $da->name;
         $data['id'] = $da->id;
         $data['cost'] = $da->cost;
         $data['unit'] = $da->unit;
         $data['street'] = $da->street;
         $data['city'] = $da->city;
         $data['zip'] = $da->zip;
         $data['info'] = $da->info;
         $data['updated_at'] = $da->updated_at;
         $data['keys'] = json_decode($da->keys);
         $data['docs'] = json_decode($da->docs);
        $data['email']=$user->email;

        Mail::send('mail.delivered', $data, function ($message) use ($data) {
            $message->from('sofroo@sofroo.com.au', 'Uholu');
            $message->subject('Items Delivered');
            $message->to($data['email']);
     });


            return 'Email was sent';

    }
}
