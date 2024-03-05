<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Plan;
use App\passreset;
use App\EmailVerify;
use App\User;
use App\Doc;
use App\Key;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Laravel\Cashier\Cashier;
use App\Http\Controllers\Storage;
use App\Message;
use Illuminate\Support\Facades\Hash;
use Config;
use Illuminate\Support\Facades\Auth;

use Intervention\Image\ImageManagerStatic as Image;
// use Intervention\Image\Facades\Image as Image;


class customerController extends Controller
{

    public function __construct(){
        \Stripe\Stripe::setApiKey(config('app.stripe.secret'));
    }


    public function index()
    {
        $data=User::all();
        return response()->json($data);

    }


    public function deleteUser($id){
        $user=User::find($id);
        $data=Doc::where('custid',$id)->get();
        foreach($data as $d){
            $d->delete();
        }
        $foo=Key::where('custid',$id)->get();
        foreach($foo as $f){
            $f->delete();
        }
        $user->delete();
    }


    public function create(request $request)
    {

        return \Stripe\Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            ]);



    }

    public function retrieve($id)
    {
      return  \Stripe\Customer::retrieve($id);


    }

    /**
     * @OA\Post(
     *     path="/api/add-payment-method",
     *     tags={"payment"},
     * @OA\Parameter(
     *     name="stripe_token",
     *     in="query",
     *     description="stripe token",
     * ),
     *     @OA\Response(response="200", description="upload users profile picture"),
     *     security={
     *         {"query_token": {}}
     *     }
     * )
     */
    public function update(request $request)
    {
        $user = Auth::user();
        \Stripe\Stripe::setApiKey(config('app.stripe.secret'));
       $data= \Stripe\Customer::update(
            $user->stripe_id,
            ['source' => $request->stripe_token]
          );

        $user=User::where('stripe_id',$user->stripe_id)->first();
        $foo=User::where('parent_id',$user->id)->get();
        if($foo){
            foreach($foo as $fo){
                $fo->card_brand=$data->sources->data[0]->brand;
                $fo->card_last_four=$data->sources->data[0]->last4;
                $fo->trial_ends_at=$data->sources->data[0]->exp_month.'/'.$data->sources->data[0]->exp_year;
                $fo->save();
                }
        }
        $user->card_brand=$data->sources->data[0]->brand;
        $user->card_last_four=$data->sources->data[0]->last4;
        $user->trial_ends_at=$data->sources->data[0]->exp_month.'/'.$data->sources->data[0]->exp_year;
        $user->save();
        return response()->json(
            [
                'success' =>'true',
                'message' => 'Payment_Method_Added',
            ]
        );

    }



    public function addcontactnumber(request $request){
        $user = Auth::user();
        $user=User::find($user->id);
        $user->phone='+61'.$request->phone;
        $user->message_counter=0;
        $user->edits=0;
        $user->storage=true;
        $user->delivery=true;
        $user->pickup=true;
        $user->active=true;
        $user->history=true;
        $user->staff=true;
        $user->record=true;
        $user->save();
    }

/**
     * @OA\Post(
     *     path="/api/customer-profile",
     *     tags={"customer"},
     * * @OA\Parameter(
     *     name="email",
     *     in="query",
     *     description="Email of the user",
     * ),
     * @OA\Parameter(
     *     name="first_name",
     *     in="query",
     *     description="first name",
     * ),
     * @OA\Parameter(
     *     name="last_name",
     *     in="query",
     *     description="last name",
     * ),
     * @OA\Parameter(
     *     name="date_of_birth",
     *     in="query",
     *     description="DOB",
     * ),
     * @OA\Parameter(
     *     name="kin_fname",
     *     in="query",
     *     description="kin first name",
     * ),
     * @OA\Parameter(
     *     name="kin_lname",
     *     in="query",
     *     description="kin last name",
     * ),
     * @OA\Parameter(
     *     name="kin_email",
     *     in="query",
     *     description="kin email",
     * ),
     * @OA\Parameter(
     *     name="kin_phone",
     *     in="query",
     *     description="kin phone",
     * ),
     * @OA\Parameter(
     *     name="kin_relation",
     *     in="query",
     *     description="kin relation",
     * ),
     *     @OA\Response(response="200", description="update profile"),
     *     security={
     *         {"query_token": {}}
     *     }
     * )
     */
    public function updateprofile(request $request)
    {

        $user = Auth::user();
        if($user->role != 'customer'){
            return response()->json(
                [
                    'message' => 'users_role_is_not_customer',
                ]
            );
        }
        $data=User::find($user->id);

        if($request->email){
        if($data->email!=$request->email){

            $unique=User::where('email',$request->email)->get();
            if(count($unique)){
            //    return 'exists';
               return response()->json(
                [
                    'message' => 'email_exists',
                ]
            );
            }
            else{
            $data->email=$request->email;
            $data->email_verified_at=null;






            $deleteVar=EmailVerify::where('email',$request->email)->get();
        foreach($deleteVar as $dels){
            $dels->delete();
        }
        $add=new EmailVerify();
        $code=rand(10000000000000,99999999999999);
        //return $code;
        $add->email=$request->email;
        $add->code=$code;
        $add->save();
        $mail['email']=$request->email;
        $mail['link']=url('/').'/verification?code='.$code;
        //return $mail['link'];
        Mail::send('mail.verifyEmail', $mail, function ($message) use ($mail) {
            $message->from('sofroo@sofroo.com.au', 'Uholu');
            $message->subject('Email Verification');
            $message->to($mail['email']);
     });


    }



        }
    }
        //return $data;
        if($request->first_name){
            $data->name=$request->first_name;
        }
        if($request->last_name){
            $data->last_name=$request->last_name;
        }
        if($request->email){
            $data->email=$request->email;
        }
        if($request->date_of_birth){
                $data->dob=$request->date_of_birth;
        }
        if($request->kin_fname){
                    $data->kname=$request->kin_fname;
        }
        if($request->kin_lname){
            $data->klast_name=$request->kin_lname;
        }
        if($request->kin_email){
            $data->kemail=$request->kin_email;
        }
        if($request->kin_phone){
            $data->kphone=$request->kin_phone;
        }
        if($request->kin_relation){
            $data->krelation=$request->kin_relation;
        }
        $data->profile_check_1=true;
        if($data->profile_check_2==1 && $data->profile_check_3==1)
        {$data->status="Approved";
        $data->edits=$data->edits+1;
        $data->save();
        if($data->edits==1){
        // return 'completed';
        return response()->json(
            [
                'success' =>'true',
                'message' => 'profile_completed',
            ]
        );
        }
        else if($data->edits>1){
            // return 'updated';
            return response()->json(
                [
                    'success' =>'true',
                    'message' => 'profile_updated',
                ]
            );
         }
        }
        else{
            if($data->edits==0){
                $data->save();
                // return 'next';
                return response()->json(
                    [
                        'message' => 'next_tab',
                    ]
                );
            }
        }
        //$data->status=1;
        // $data->profile_pic=$destinationfile;
        $data->save();

    }


    /**
     * @OA\Post(
     *     path="/api/business-profile",
     *     tags={"customer"},
     * * @OA\Parameter(
     *     name="email",
     *     in="query",
     *     description="Email of the user",
     * ),
     * @OA\Parameter(
     *     name="first_name",
     *     in="query",
     *     description="first name",
     * ),
     * @OA\Parameter(
     *     name="last_name",
     *     in="query",
     *     description="last name",
     * ),
     * @OA\Parameter(
     *     name="date_of_birth",
     *     in="query",
     *     description="DOB",
     * ),
     * @OA\Parameter(
     *     name="company_name",
     *     in="query",
     *     description="name of the company",
     * ),
     * @OA\Parameter(
     *     name="abn",
     *     in="query",
     *     description="company ABN",
     * ),
     * @OA\Parameter(
     *     name="title",
     *     in="query",
     *     description="Job title of the user",
     * ),
     * @OA\Parameter(
     *     name="phone",
     *     in="query",
     *     description="phone",
     * ),
     *     @OA\Response(response="200", description="update profile of business"),
     *     security={
     *         {"query_token": {}}
     *     }
     * )
     */

    public function businesspro(request $request){
        $user = Auth::user();
        if($user->role != 'business'){
            return response()->json(
                [
                    'message' => 'users_role_is_not_business',
                ]
            );
        }
        $data=User::find($user->id);
        if($request->email){
        if($data->email!=$request->email){

            $unique=User::where('email',$request->email)->get();
            if(count($unique)){
            //    return 'exists';
               return response()->json(
                [
                    'message' => 'email_exists',
                ]
            );
            }
            else{
            $data->email=$request->email;
            $data->email_verified_at=null;






            $deleteVar=EmailVerify::where('email',$request->email)->get();
        foreach($deleteVar as $dels){
            $dels->delete();
        }
        $add=new EmailVerify();
        $code=rand(10000000000000,99999999999999);
        //return $code;
        $add->email=$request->email;
        $add->code=$code;
        $add->save();
        $mail['email']=$request->email;
        $mail['link']=url('/').'/verification?code='.$code;
        //return $mail['link'];
        Mail::send('mail.verifyEmail', $mail, function ($message) use ($mail) {
            $message->from('sofroo@sofroo.com.au', 'Uholu');
            $message->subject('Email Verification');
            $message->to($mail['email']);
     });


    }


        }
    }
        //return $data;
        if($request->fisrt_name){
            $data->name=$request->fisrt_name;
        }
        if($request->last_name){
            $data->last_name=$request->last_name;
        }
        if($request->email){
            $data->email=$request->email;
        }
        if($request->date_of_birth){
            $data->dob=$request->date_of_birth;
        }
        if($request->company_name){
            $data->cname=$request->company_name;
        }
        if($request->abn){
            $data->abn=$request->abn;
        }
        if($request->title){
            $data->title=$request->title;
        }
            $data->profile_check_1=true;
        if($request->phone){
            $data->phone=$request->phone;
        }
        if($data->profile_check_2==1 && $data->profile_check_3==1)
        {$data->status="Approved";
            $data->edits=$data->edits+1;
            $data->save();
            if($data->edits==1){
            // return 'completed';
            return response()->json(
                [
                    'success' =>'true',
                    'message' => 'profile_completed',
                ]
            );
            }
            else if($data->edits>1){
                // return 'updated';
                return response()->json(
                    [
                        'success' =>'true',
                        'message' => 'profile_updated',
                    ]
                );
            }
        }
        else{
            if($data->edits==0){
                $data->save();
                // return 'next';
                return response()->json(
                    [
                        'message' => 'next_tab',
                    ]
                );
            }
        }
        $foo=User::where('parent_id',$data->id)->get();
        if($foo){
            foreach($foo as $fo){
                $fo->cname=$request->cname;
                $fo->abn=$request->abn;
                $fo->title=$request->title;
                //$fo->profile_check_1=true;
                $fo->phone=$request->phone;
                $fo->save();
            }
        }
        $data->save();
    }

    /**
     * @OA\Post(
     *     path="/api/customer-profile-picture",
     *     tags={"customer"},
     * * @OA\Parameter(
     *     name="image",
     *     in="query",
     *     description="users profile picture in file format",
     * ),
     *     @OA\Response(response="200", description="upload users profile picture"),
     *     security={
     *         {"query_token": {}}
     *     }
     * )
     */


    public function updatePro(request $request){
        $user = Auth::user();
        $data=User::find($user->id);
        $paths='upload/'.$user->id.'_'.time().rand().'.jpeg';
        $path =url('/').'/'.$paths;
        if (!file_exists('upload')) {
            mkdir('upload', 666, true);
            }
        Image::make(file_get_contents($request->image))->save($paths);
        $data->profile_pic=$path;
        $data->save();

    }


/**
     * @OA\Post(
     *     path="/api/customer-image-upload",
     *     tags={"customer"},
     * * @OA\Parameter(
     *     name="upload_images",
     *     in="query",
     *     description="array of images ['license_front'], ['license_back'], ['photo_id']",
     * ),
     *     @OA\Response(response="200", description="upload users doucment pictures"),
     *     security={
     *         {"query_token": {}}
     *     }
     * )
     */

    public function updateimg(request $request){
        $user = Auth::user();
        $data=User::find($user->id);

        foreach($request->upload_images as $key=>$value)
        {

                if($value)
                {//'/upload/'.$request->addid.'_'.time().'.jpeg';
                    $paths='upload/'.$user->id.'_'.time().rand().'.jpeg';
                    $path =url('/').'/'.$paths;
                    if (!file_exists('upload'))
                    {
                         mkdir('upload', 666, true);
                    }
                    //$pa = \Storage::disk('uploads')->getAdapter()->getPathPrefix();
                    Image::make(file_get_contents($value))->save($paths);
                    $data->$key=$path;
                }
        }
        $data->profile_check_3=1;
        if($data->profile_check_2==1 && $data->profile_check_1==1)
        {$data->status="Approved";
            $data->edits=$data->edits+1;
            $data->save();
            if($data->edits==1){
                $data1=User::find($data->id);
                if($data1->license_front && $data1->license_back && $data1->photo_id)
                {
                    $data1->delete_error=null;
                    $data1->save();
                }
            // return 'completed';
            return response()->json(
                [
                    'success' =>'true',
                    'message' => 'profile_completed',
                ]
            );
            }
            else if($data->edits>1){
                $data1=User::find($data->id);
                if($data1->license_front && $data1->license_back && $data1->photo_id)
                {
                    $data1->delete_error=null;
                    $data1->save();
                }
                // return 'updated';
                return response()->json(
                    [
                        'success' =>'true',
                        'message' => 'profile_updated',
                    ]
                );
            }
        }
        else{
            if($data->edits==0){
                $data->save();
                $data1=User::find($data->id);
                if($data1->license_front && $data1->license_back && $data1->photo_id)
                {
                    $data1->delete_error=null;
                    $data1->save();
                }
                return response()->json(
                    [
                        'message' => 'next_tab',
                    ]
                );
            }
        }

        $data->save();

        $data1=User::find($data->id);
        if($data1->license_front && $data1->license_back && $data1->photo_id)
        {
            $data1->delete_error=null;
            $data1->save();
            return response()->json(
                [
                    'success' =>'true',
                    'message' => 'profile_completed',
                ]
            );
        }

    }



/**
     * @OA\Post(
     *     path="/api/update-customer-address",
     *     tags={"customer"},
     * * @OA\Parameter(
     *     name="email",
     *     in="query",
     *     description="Name of the user",
     * ),
     * @OA\Parameter(
     *     name="unit",
     *     in="query",
     *     description="House unit number",
     * ),
     * @OA\Parameter(
     *     name="city",
     *     in="query",
     *     description="city",
     * ),
     * @OA\Parameter(
     *     name="zip",
     *     in="query",
     *     description="zip number",
     * ),
     * @OA\Parameter(
     *     name="delivery_info",
     *     in="query",
     *     description="delivery information",
     * ),
     * @OA\Parameter(
     *     name="secondary_check",
     *     in="query",
     *     description="1 if the user has a secondary address, 0 if no secondary address",
     * ),
     * @OA\Parameter(
     *     name="secondary_unit",
     *     in="query",
     *     description="unit number of secondary address",
     * ),
     * @OA\Parameter(
     *     name="secondary_street",
     *     in="query",
     *     description="street number of secondary address",
     * ),
     * @OA\Parameter(
     *     name="secondary_city",
     *     in="query",
     *     description="city of secondary address",
     * ),
     * @OA\Parameter(
     *     name="secondary_zip",
     *     in="query",
     *     description="zip of secondary address",
     * ),
     * @OA\Parameter(
     *     name="secondary_info",
     *     in="query",
     *     description="delivery info of secondary address",
     * ),
     *     @OA\Response(response="200", description="update users address"),
     *     security={
     *         {"query_token": {}}
     *     }
     * )
     */


    public function updateaddress(request $request){
        $user = Auth::user();
        $data=User::find($user->id);
        $data->unit=$request->unit;
        $data->street=$request->street;
        $data->city=$request->city;
        $data->zip=$request->zip;
        $data->delivery_info=$request->delivery_info;
        $data->profile_check_2=true;
        $data->sec_unit=$request->secondary_unit;
        $data->sec_street=$request->secondary_street;
        $data->sec_city=$request->secondary_city;
        $data->sec_zip=$request->secondary_zip;
        $data->sec_info=$request->secondary_info;
        $data->sec_address_check=$request->secondary_check;

        //$data->status=1;
        $foo=User::where('parent_id',$data->id)->get();
        if($foo){
            foreach($foo as $fo){
                $fo->unit=$request->unit;
                $fo->street=$request->street;
                $fo->city=$request->city;
                $fo->zip=$request->zip;
                $fo->delivery_info=$request->info;
                $fo->profile_check_2=true;
                $fo->sec_unit=$request->secondary_unit;
                $fo->sec_street=$request->secondary_street;
                $fo->sec_city=$request->secondary_city;
                $fo->sec_zip=$request->secondary_zip;
                $fo->sec_info=$request->secondary_info;
                $fo->sec_address_check=$request->secondary_check;
                $fo->save();
            }
        }
        if($data->profile_check_3==1 && $data->profile_check_1==1)
        {$data->status="Approved";
            $data->edits=$data->edits+1;
            $data->save();
            if($data->edits==1){
            // return 'completed';
            return response()->json(
                [
                    'success' => 'true',
                    'message' => 'profile_completed',
                ]
            );
            }
            else if($data->edits>1){
                // return 'updated';
                return response()->json(
                    [
                        'success' => 'true',
                        'message' => 'profile_updated',
                    ]
                );
            }
        }
        else{
            if($data->edits==0){
                $data->save();
                // return 'next';
                return response()->json(
                    [
                        'message' => 'next_tab',
                    ]
                );
            }
        }
        $data->save();

    }



    public function delete($id)
    {
        $customer = \Stripe\Customer::retrieve(
            $id
          );
          $customer->delete();
          return $customer;

    }
    public function defaultPayment(request $request,$id){

       return  \Stripe\Customer::update(
            $id,
            //['name' => $request->name],
            [' invoice_settings->default_payment_method '=> $request->payment_id]

          );
    }

    public function updatepackage(Request $request,$id){
            //$request1=json_decode($request);
            $data=User::where('stripe_id','=',$id)->first();
            //return $request->doc_id;
            $data->doc_id=$request->doc_id;
            $data->doc_quantity=$request->doc_quantity;
            $data->sub_id=$request->sub1;
            $data->key_id=$request->key_id;
            $data->key_quantity=$request->key_quantity;
            $data->sub_id2=$request->sub2;
            $data->payment_counter=1;
            $data->payment_del=1;
            $data->status='Incomplete';
            $data->save();
            // return "updated";


    }

    public function resubpackage(Request $request,$id){
        //$request1=json_decode($request);
        $data=User::where('stripe_id','=',$id)->first();
        //return $request->doc_id;
        if($request->item=='doc'){
        $data->doc_id=$request->ids;
        $data->doc_quantity=$request->quantity;
        $data->sub_id=$request->sub;}
        else if($request->item=='key'){
        $data->key_id=$request->ids;
        $data->key_quantity=$request->quantity;
        $data->sub_id2=$request->sub;}
        // $data->payment_counter=1;
        // $data->payment_del=1;
        // $data->status='Incomplete';
        $data->save();
        // return "updated";


}

    public function getUsers(){
        $data=User::where('role','customer')->orWhere('role','business')->orWhere('role','staff')->get();
        return $data;
    }

    public function userCounter(){
        $data=User::where('role','customer')->orWhere('role','business')->orWhere('role','staff')->get();
        return count($data);
    }

    public function pendinguserCounter(){
        $data=User::where('status','Pending')->where(function($query){
            $query->where('role','customer')->orWhere('role','business')->orWhere('role','staff');
        })->get();
        return count($data);
    }

    public function updateAdminPro(request $request,$id){
        $data=User::find($id);
        $data->name=$request->name;
        $data->last_name=$request->last_name;
        $data->unit=$request->unit;
        $data->street=$request->street;
        $data->city=$request->city;
        $data->zip=$request->zip;
        $data->delivery_info=$request->delivery_info;
        $data->status=$request->status;
        $data->message=$request->message;
        $data->Admin_comments=$request->Admin_comments;
        $data->save();
    }


    public function updateAdminBus(request $request,$id){
        $data=User::find($id);
        $data->name=$request->name;
        $data->last_name=$request->last_name;
        $data->unit=$request->unit;
        $data->street=$request->street;
        $data->city=$request->city;
        $data->zip=$request->zip;
        $data->delivery_info=$request->delivery_info;
        $data->status=$request->status;
        $data->message=$request->message;
        $data->cname=$request->cname;
        $data->title=$request->title;
        $data->abn=$request->abn;
        $data->Admin_comments=$request->Admin_comments;
        $data->save();
    }

    public function addrole(request $request,$id){
        $data=User::find($id);
        $data->role=$request->role;
        $data->save();
    }

    public function quantityUpdate(request $request){
        $data=User::where('stripe_id',$request->stripe_id)->first();
        if($request->type=='doc'){

            $data->doc_quantity=$request->quantity;
            //return 'doc';

        }

        if($request->type=='key'){

            $data->key_quantity=$request->quantity;
            //return 'key';
        }
        $data->save();

    }

/**
     * @OA\Get(
     *     path="/api/update-message-counter",
     *     tags={"customer"},
     *     @OA\Response(response="200", description="Update message counter of user"),
     *     security={
     *         {"query_token": {}}
     *     }
     * )
     */
    public function updateMessageCounter(){
        $user = Auth::user();
        $data=User::find($user->id);
        $messages=Message::where('customer_id',$user->id)->get();
        $data->message_counter=count($messages);

        $data->save();

        return response()->json(
            [
                'success' =>'true',
                'message' => 'Counter_Updated',
            ]
        );

    }


    public function emailCheck(request $request){
        $user=User::where('email',$request->cemail)->first();
        if($user){
            return 'Exists';
        }
        else{
            return 'New';
        }
    }

    public function getStaff(request $request){
        $user=User::where('role','staff')->Where('parent_id',$request->parent_id)->get();
        return $user;
    }

    public function deleteStaff($id){
        $data=User::find($id);
        $parent=User::find($data->parent_id);
        $parent->staff_quantity=$parent->staff_quantity-1;
        $parent->save();
        $data->delete();
    }

    public function updateStaff(request $request,$id){
        $data=User::find($id);
        $data->email=$request->emailc;
        //$data->password=Hash::make($request->passwordc);
        $data->name=$request->namec;
        $data->last_name=$request->last_namec;
        $data->storage=$request->storagec;
        $data->delivery=$request->deliveryc;
        $data->pickup=$request->pickupc;
        $data->active=$request->activec;
        $data->history=$request->historyc;
        $data->save();
        //$data->staff=$request->staffc;

    }

    public function addStaff(request $request,$id){
        $user=User::find($id);
        if($user->staff_quantity>=5){
            return 'Full';
        }
        else{
        $data=new User();
        $data->name=$request->namec;
        $data->last_name=$request->last_namec;
        $data->password=Hash::make($request->passwordc);
        $data->email=$request->emailc;
        $data->phone=$user->phone;
        $data->doc_id=$user->doc_id;
        $data->doc_quantity=$user->doc_quantity;
        $data->key_id=$user->key_id;
        $data->key_quantity=$user->key_quantity;
        $data->stripe_id=$user->stripe_id;
        $data->card_brand=$user->card_brand;
        $data->card_last_four=$user->card_last_four;
        $data->trial_ends_at=$user->trial_ends_at;
        $data->sub_id=$user->sub_id;
        $data->sub_id2=$user->sub_id2;
        $data->profile_check_1=true;
        $data->profile_check_2=true;
        $data->profile_check_3=true;
        $data->payment_counter=2;
        $data->payment_del=2;
        $data->role='staff';
        $data->status='Approved';
        $data->unit=$user->unit;
        $data->street=$user->street;
        $data->city=$user->city;
        $data->zip=$user->zip;
        $data->delivery_info=$user->delivery_info;
        $data->sec_unit=$user->sec_unit;
        $data->sec_street=$user->sec_street;
        $data->sec_city=$user->sec_city;
        $data->sec_zip=$user->sec_zip;
        $data->sec_info=$user->sec_info;
        $data->sec_address_check=$user->sec_address_check;
        $data->cname=$user->cname;
        $data->abn=$user->abn;
        $data->title=$user->title;
        $data->storage=$request->storagec;
        $data->delivery=$request->deliveryc;
        $data->pickup=$request->pickupc;
        $data->active=$request->activec;
        $data->history=$request->historyc;
        $mytime = Carbon::now();
        $data->email_verified_at=$mytime;
        //$data->staff=$request->staffc;
        $data->parent_id=$id;

        $data->save();

        $user->staff_quantity=$user->staff_quantity+1;

        $user->save();}


    }

    public function getAdmin(request $request){
        $user=User::where('role','admin')->where('parent_id',null)->get();
        return $user;
    }

    public function deleteAdmin($id){
        $data=User::find($id);
        //$parent=User::find($data->parent_id);
        //$parent->staff_quantity=$parent->staff_quantity-1;
        //$parent->save();
        $data->delete();
    }

    public function updateAdmin(request $request,$id){
        $data=User::find($id);
        $data->name=$request->namec;
        $data->last_name=$request->last_namec;
        if($request->pass){
        $data->password=Hash::make($request->pass);}
        $data->email=$request->emailc;
        $data->phone=$request->phonec;
        if($request->users==false){
            $data->user_admin=null;
        }
        else{
        $data->user_admin=$request->users;}
        if($request->itemss==false)
        {$data->items_admin=null;}
        else{
        $data->items_admin=$request->itemss;}
        if($request->active==false)
        {$data->activereq_admin=null;}
        else{
        $data->activereq_admin=$request->active;}
        if($request->history==false)
        {$data->historyreq_admin=null;}
        else{
        $data->historyreq_admin=$request->history;}
        if($request->message==false)
        {$data->message_admin=null;}
        else{
        $data->message_admin=$request->message;}
        if($request->scanreq==false)
        {$data->scanreq_admin=null;}
        else{
        $data->scanreq_admin=$request->scanreq;}
        if($request->scanhis==false)
        {$data->scanhistory_admin=null;}
        else{
        $data->scanhistory_admin=$request->scanhis;}
        if($request->contact==false)
        {$data->contact_admin=null;}
        else{
        $data->contact_admin=$request->contact;}
        if($request->support==false)
        {$data->support_admin=null;}
        else{
        $data->support_admin=$request->support;}
        $data->save();
        //$data->staff=$request->staffc;

    }

    public function addAdmin(request $request,$id){

        $data=new User();
        $data->name=$request->namec;
        $data->last_name=$request->last_namec;
        $data->password=Hash::make($request->passwordc);
        $data->email=$request->emailc;
        $data->phone=$request->phonec;
        //$data->doc_id=$user->doc_id;
        //$data->doc_quantity=$user->doc_quantity;
        //$data->key_id=$user->key_id;
        //$data->key_quantity=$user->key_quantity;
        //$data->stripe_id=$user->stripe_id;
        //$data->card_brand=$user->card_brand;
        //$data->card_last_four=$user->card_last_four;
        //$data->trial_ends_at=$user->trial_ends_at;
        //$data->sub_id=$user->sub_id;
        //$data->sub_id2=$user->sub_id2;
        $data->profile_check_1=true;
        $data->profile_check_2=true;
        $data->profile_check_3=true;
        $data->payment_counter=2;
        $data->payment_del=2;
        $data->role='admin';
        $data->status='Approved';
        //$data->unit=$user->unit;
        //$data->street=$user->street;
        //$data->city=$user->city;
        //$data->zip=$user->zip;
        //$data->delivery_info=$user->delivery_info;
        //$data->sec_unit=$user->sec_unit;
        // $data->sec_street=$user->sec_street;
        // $data->sec_city=$user->sec_city;
        // $data->sec_zip=$user->sec_zip;
        // $data->sec_info=$user->sec_info;
        // $data->sec_address_check=$user->sec_address_check;
        // $data->cname=$user->cname;
        // $data->abn=$user->abn;
        // $data->title=$user->title;
        $data->user_admin=$request->users;
        $data->items_admin=$request->itemss;
        $data->activereq_admin=$request->active;
        $data->historyreq_admin=$request->history;
        $data->message_admin=$request->message;
        $data->scanreq_admin=$request->scanreq;
        $data->scanhistory_admin=$request->scanhis;
        $data->contact_admin=$request->contact;
        $data->support_admin=$request->support;
        $mytime = Carbon::now();
        $data->email_verified_at=$mytime;
        //$data->staff=$request->staffc;
        //$data->parent_id=$id;

        $data->save();

        //$user->staff_quantity=$user->staff_quantity+1;

        //$user->save();


    }

    public function uniqueNumber(request $request){
        $data=User::where('phone',$request->phone)->where('role',$request->role)->get();
        //return $data;
        if(count($data)){
            return 'exists';
        }
        else{
            return 'new';
        }
    }

    public function passwordUpdate(request $request){
        $data=User::where('email',$request->emailc)->first();
        $data->password=Hash::make($request->passwordc);
        $data->save();

        $deleteVar=passreset::where('email',$request->emailc)->first();
        $deleteVar->delete();
    }

    // public function passwordUpdate(request $request){
    //     $data=User::where('email',$request->emailc)->first();
    //     $data->password=Hash::make($request->passwordc);
    //     $data->save();

    //     $deleteVar=passreset::where('email',$request->emailc)->first();
    //     $deleteVar->delete();
    // }
    public function verifyEmail(request $request){
        $data=User::where('email',$request->emailc)->first();
        $mytime = Carbon::now();
        $data->email_verified_at=$mytime;
        $data->save();

        $deleteVar=EmailVerify::where('email',$request->emailc)->first();
        $deleteVar->delete();
    }

    public function uniqueEmailId(request $request){
        $data=User::where('email',$request->email)->get();
        if(count($data)){
            return 'exists';
        }
        else{
            return 'unique';
        }
    }

    public function loginPassword(request $request){
        $user = User::where('email',$request->email)->first();
        if (Hash::check($request->password, $user->password)) {
            // Success
            return 'true';
        }
        else{
            return 'false';
        }
    }
    public function loginEmail(request $request){
        $user = User::where('email',$request->email)->get();
        if (count($user)) {
            // Success
            return 'true';
        }
        else{
            return 'false';
        }
    }

    public function updateActiveRequestCount(request $request,$id){
        $user=User::find($id);
        // foreach($users as $user){
        //     $user->activereq_counter=$request->new_value;
        //     $user->save();
        // }
        $user->activereq_counter=$request->new_value;
        $user->save();
    }

    public function updateActiveScanCount(request $request,$id){
        $user=User::find($id);
        // foreach($users as $user){
        //     $user->activereq_counter=$request->new_value;
        //     $user->save();
        // }
        $user->scanreq_counter=$request->new_value;
        $user->save();
    }

    public function updateContactFormCount(request $request,$id){
        $user=User::find($id);
        // foreach($users as $user){
        //     $user->activereq_counter=$request->new_value;
        //     $user->save();
        // }
        $user->contact_counter=$request->new_value;
        $user->save();
    }

    public function verifyAdmin(request $request,$id){
        $admin=User::find($id);

        if(Hash::check($request->ver_pass, $admin->password)){
            return 'verified';
        }
        else{
            return 'failed';
        }
    }

    /**
     * @OA\Post(
     *     path="/api/update-newpassword",
     *     tags={"customer"},
     * * @OA\Parameter(
     *     name="new_password",
     *     in="query",
     *     description="New password",
     * ),
      * * @OA\Parameter(
     *     name="new_password",
     *     in="query",
     *     description="previous password",
     * ),
     *     @OA\Response(response="200", description="change users password"),
     *     security={
     *         {"query_token": {}}
     *     }
     * )
     */


    public function updatePassword(request $request)
    {
        $user = Auth::user();
        $user=User::find($user->id);
        // $user = User::find($id);
        if (Hash::check($request->old_password, $user->password)) {
            $save_password = Hash::make($request->new_password);
            $user->password = $save_password;
            $user->save();
            // return 'updated';
            return response()->json(
                [
                    'success' =>'true',
                    'message' => 'password_updated',
                ]
            );
        }

        // return 'mismatch';
        return response()->json(
            [
                'success' =>'true',
                'message' => 'password_mismatch',
            ]
        );
    }

    public function deleteImageFile(request $request, $id)
    {
        $user = User::find($id);
        if($request->type == 'front')
        {
            $user->license_front = null;
        }
        if($request->type == 'back')
        {
            $user->license_back = null;
        }
        if($request->type == 'id')
        {
            $user->photo_id = null;
        }
        $user->profile_check_3 = null;
        $user->delete_error=1;
        $user->save();
    }

     /**
     * @OA\Get(
     *     path="/api/get-address",
     *     tags={"customer"},
     *     @OA\Response(response="200", description="Get logged in users address"),
     *     security={
     *         {"query_token": {}}
     *     }
     * )
     */

    public function getaddress()
    {
        $user = Auth::user();
        $return[0]['unit'] = $user->unit;
        $return[0]['street'] = $user->street;
        $return[0]['city'] =$user->city;
        $return[0]['zip'] = $user->zip;
        $return[0]['info'] = $user->delivery_info;

        $return[1]['unit'] = $user->sec_unit;
        $return[1]['street'] = $user->sec_street;
        $return[1]['city'] =$user->sec_city;
        $return[1]['zip'] = $user->sec_zip;
        $return[1]['info'] = $user->sec_info;

        return $return;
    }

     /**
     * @OA\Get(
     *     path="/api/get-role",
     *     tags={"customer"},
     *     @OA\Response(response="200", description="Get logged in users role"),
     *     security={
     *         {"query_token": {}}
     *     }
     * )
     */

    public function getrole()
    {
        $user = Auth::user();

        return $user->role;
    }
}
