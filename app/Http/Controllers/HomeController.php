<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use Illuminate\Http\Request;
use App\User;
use App\Scan;
use App\Pickup;
use App\Delivery;
use App\code;

use Exception;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function mail(request $request)
    {
        $da=User::where('stripe_id',$request->id)->first();

        // $data['name'] = $da->name;
        // $data['email']=$da->email;
        $data['name'] = $da->name;
        $data['email']= $da->email;
        //$data['email']='izhan47@gmail.com';
        Mail::send('mail.name', $data, function ($message) use ($data) {
            $message->from('sofroo@sofroo.com.au', 'Uholu');
            $message->subject('Welcome to Uholu');
            $message->to($data['email']);
     });


            return 'Email was sent';



        }


        public function mailOrder(request $request)
    {   //$request->id=18;
        $da=Pickup::where('id',$request->id)->first();
        //return $da;
        $user=User::where('id',$da->customer_id)->first();
        //return $user->email;
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
         //$data['keys'] = $da->keys;
         $data['docs'] = json_decode($da->docs);
//return  $data['keys'];
         // $data['email']=$da->email;
        //$data['name'] ='Aanif';
       // $data['email']='izhan47@gmail.com';
        $data['email']=$user->email;
        Mail::send('mail.reqorder', $data, function ($message) use ($data) {
            $message->from('sofroo@sofroo.com.au', 'Uholu');
            $message->subject('Your Pickup Request');
            $message->to($data['email']);
     });


            return 'Email was sent';



        }

        public function mailOrderdel(request $request)
    {   //$id=16;
        $da=Delivery::where('id',$request->id)->first();
        //return $da;
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
         //$data['keys'] = $da->keys;
         $data['docs'] = json_decode($da->docs);
//return  $data['keys'];
         // $data['email']=$da->email;
        //$data['name'] ='Aanif';
        //$data['email']='izhan47@gmail.com';
        $data['email']=$user->email;

        Mail::send('mail.delorder', $data, function ($message) use ($data) {
            $message->from('sofroo@sofroo.com.au', 'Uholu');
            $message->subject('Your Delivery Request');
            $message->to($data['email']);
     });


            return 'Email was sent';



        }




        public function delivered(request $request)
    {   //$id=16;
        $da=Delivery::where('id',$request->id)->first();
        //return $da;
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
         //$data['keys'] = $da->keys;
         $data['docs'] = json_decode($da->docs);
//return  $data['keys'];
         // $data['email']=$da->email;
        //$data['name'] ='Aanif';
        //$data['email']='izhan47@gmail.com';
        $data['email']=$user->email;

        Mail::send('mail.delivered', $data, function ($message) use ($data) {
            $message->from('sofroo@sofroo.com.au', 'Uholu');
            $message->subject('Items Delivered');
            $message->to($data['email']);
     });


            return 'Email was sent';



        }



        public function secured(request $request)
    {   //$id=16;
        $da=Pickup::where('id',$request->id)->first();
        //return $da;
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
         //$data['keys'] = $da->keys;
         $data['docs'] = json_decode($da->docs);
//return  $data['keys'];
         // $data['email']=$da->email;
        //$data['name'] ='Aanif';
        //$data['email']='izhan47@gmail.com';
        $data['email']=$user->email;

        Mail::send('mail.secured', $data, function ($message) use ($data) {
            $message->from('sofroo@sofroo.com.au', 'Uholu');
            $message->subject('Items Secured');
            $message->to($data['email']);
     });


            return 'Email was sent';



        }

        public function pickorder(request $request)//Done
    {   //$request->id=18;
        $da=Pickup::where('id',$request->id)->first();
        $admins=User::where('role','admin')->get();
        //return $da;
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
         //$data['keys'] = $da->keys;
         $data['docs'] = json_decode($da->docs);
//return  $data['keys'];
         // $data['email']=$da->email;
        //$data['name'] ='Aanif';
        foreach($admins as $admin){
        //$data['email']='izhan47@gmail.com';
        $data['email']=$admin->email;
        Mail::send('mail.newpickrequest', $data, function ($message) use ($data) {
            $message->from('sofroo@sofroo.com.au', 'Uholu');
            $message->subject('New Pickup Request');
            $message->to($data['email']);
     });
    }

            return 'Email was sent';



        }


        public function delorder(request $request)//Done
    {   //$id=16;
        $da=Delivery::where('id',$request->id)->first();
        //return $da;
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
         //$data['keys'] = $da->keys;
         $data['docs'] = json_decode($da->docs);
//return  $data['keys'];
         // $data['email']=$da->email;
        //$data['name'] ='Aanif';
        foreach($admins as $admin){
        //$data['email']='izhan47@gmail.com';
        $data['email']=$admin->email;
        Mail::send('mail.newdelrequest', $data, function ($message) use ($data) {
            $message->from('sofroo@sofroo.com.au', 'Uholu');
            $message->subject('New delivery Request');
            $message->to($data['email']);
     });

    }
            return 'Email was sent';



        }



        public function invoice(request $request){
           // return $request;
            $mail['id']=$request->id;//
            $mail['name']=$request->name;//
            $mail['stripe_id']=$request->stripe_id;//
            $mail['invoice_key']=$request->invoice_key;//
            $mail['invoice_doc']=$request->invoice_doc;//
            $mail['key_cost']=$request->key_cost;//
            $mail['key_qty']=$request->key_qty;//
            $mail['doc_cost']=$request->doc_cost;//
            $mail['doc_qty']=$request->doc_qty;//
            $mail['cost']=$request->cost;//
            $mail['email']=$request->email;//
            $data=User::find($request->id);
            $mail['role']=$data->role;
            Mail::send('mail.invoice', $mail, function ($message) use ($mail) {
                $message->from('sofroo@sofroo.com.au', 'Uholu');
                $message->subject('Subscription Invoice');
                $message->to($mail['email']);
         });
        }

        public function scanRequest(request $request){
            $admins=User::where('role','admin')->get();
            $data=Scan::find($request->scan_id);
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


        public function test(request $event)
        {
            // foreach($event->data->object as $item){
            $code = new code();
            $code->phone = json_encode($event->data['object']['id']);
            $code->checkcsode = 1111;
            $code->save();
            // }
        }
}
