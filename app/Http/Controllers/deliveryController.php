<?php

namespace App\Http\Controllers;
use App\Delivery;
use App\Doc;
use App\Key;
use Illuminate\Support\Facades\Auth;
use App\payments;
use App\User;
use Milon\Barcode\DNS2D;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

/**
     * @OA\Post(
     *     path="/api/create-delivery",
     *     tags={"delivery"},
     * @OA\Parameter(
     *     name="delivery_keys",
     *     in="query",
     *     description="assigned_ids of keys for delivery in form of an array",
     * ),
     * @OA\Parameter(
     *     name="delivery_docs",
     *     in="query",
     *     description="assigned_ids of docs for delivery in form of an array",
     * ),
     * @OA\Parameter(
     *     name="address_unit",
     *     in="query",
     *     description="unit number of the delivery address",
     * ),
     * @OA\Parameter(
     *     name="address_street",
     *     in="query",
     *     description="street number of the delivery address",
     * ),
     * @OA\Parameter(
     *     name="address_city",
     *     in="query",
     *     description="city of the delivery address",
     * ),
     * @OA\Parameter(
     *     name="address_zip",
     *     in="query",
     *     description="zip of the delivery address",
     * ),
     * @OA\Parameter(
     *     name="delivery_info",
     *     in="query",
     *     description="delivery information",
     * ),
     * @OA\Parameter(
     *     name="delivery_type",
     *     in="query",
     *     description="normal or urgent delivery",
     * ),
     * @OA\Parameter(
     *     name="delivery_cost",
     *     in="query",
     *     description="cost of delivery, 2500 for normal, 3500 for urgent",
     * ),
     *     @OA\Response(response="200", description="Create delivery request"),
     *     security={
     *         {"query_token": {}}
     *     }
     * )
     */
class deliveryController extends Controller
{
    //
    public function create(request $request){
        $user = Auth::user();
        $user=User::find($user->id);
        $data=new Delivery();
        $data->customer_id=$user->id;
        $data->customer_id_stripe=$user->stripe_id;
        $data->keys=json_encode($request->delivery_keys);
        $data->docs=json_encode($request->delivery_docs);
        $data->unit=$request->address_unit;
        $data->street=$request->address_street;
        $data->city=$request->address_city;
        $data->zip=$request->address_zip;
        $details='Delivery Payment';
        if($request->delivery_info)
        {
            $data->info=$request->delivery_info;
        }
        $data->type=$request->delivery_type;
        $data->status='Delivery Requested';

        foreach ($request->delivery_keys as $response){
            $keys=Key::where('assigned_id',$response)->where('custid',$user->id)->first();
            $keys->status='Delivery Requested';
            $keys->save();
         }
         foreach ($request->delivery_docs as $response){
             $docs=Doc::where('assigned_id',$response)->where('custid',$user->id)->first();
             $docs->status='Delivery Requested';
             $docs->save();
          }
        // $user=User::find($request->user_id);
        $data->cost=$request->delivery_cost;
        payments::paymentIntent($request->delivery_cost, $user->id, $details);
         $data->role=$user->role;
         $user->payment_del+=1;
         $data->name=$user->name;
         $user->save();
         $data->save();
        //  Delivery::emailDelivery($data->id);
        //  Delivery::adminEmailDelivery($data->id);
         return response()->json(
            [
                'success' =>'true',
                'message' => 'Delivery_Requested',
                'delivery_id' => $data->id,
            ]
        );


    }


    public function updateKrequest(request $request, $id){
        $data=Delivery::find($id);
        $data->name=$request->name;
        $data->cost=$request->cost;
        $data->unit=$request->unit;
        $data->street=$request->street;
        $data->city=$request->city;
        $data->zip=$request->zip;
        if($request->info){
            $data->info=$request->info;}
        $data->type=$request->type;
        $data->status=$request->status;
        $data->comment=$request->comment;
        $data->tracking=$request->tracking;
        foreach($request->key as $k){
            $key=Key::where('assigned_id',$k)->where('custid',$data->customer_id)->first();
            $key->status=$request->status;
            $key->save();
        }
        foreach($request->doc as $d){
            $doc=Doc::where('assigned_id',$d)->where('custid',$data->customer_id)->first();
            $doc->status=$request->status;
            $doc->save();
        }
        $data->save();
    }


    public function viewRequests(){
        $data=Delivery::with('user')->where('status','Delivery Requested')->orWhere('status','In Transit')->orWhere('status','Processing')->get();

        return $data;
    }

/**
     * @OA\Get(
     *     path="/api/view-user-delivery-requests",
     *     tags={"delivery"},
     *     @OA\Response(response="200", description="Get users delivery requests"),
     *     security={
     *         {"query_token": {}}
     *     }
     * )
     */
    public function viewRequestsUser(){
        $user = Auth::user();
        $data=Delivery::with('user')->where('customer_id','=',$user->id)->where(function($query){
            $query->where('status','Delivery Requested')->orWhere('status','In Transit')->orWhere('status','Processing');
        })->get();

        return $data;
    }

    public function viewRequestsHistory(){
        //$data=Delivery::with('user')->where('status','Delivered')->orWhere('status','Failed')->get();
        $data=Delivery::where('status','Delivered')->orWhere('status','Failed')->get();

        return $data;
    }

    public function deliveryCounter(){
        $data=Delivery::where('status','Delivery Requested')->orWhere('status','In Transit')->orWhere('status','Processing')->get();

        return count($data);
    }

/**
     * @OA\Post(
     *     path="/api/user-update-items",
     *     tags={"delivery"},
     * @OA\Parameter(
     *     name="keys",
     *     in="query",
     *     description="assigned_ids of keys for delivery in form of an array",
     * ),
     * @OA\Parameter(
     *     name="docs",
     *     in="query",
     *     description="assigned_ids of docs for delivery in form of an array",
     * ),
     * @OA\Parameter(
     *     name="delivery_id",
     *     in="query",
     *     description="ID of the delivery request",
     * ),
     *     @OA\Response(response="200", description="user confirms delivery"),
     *     security={
     *         {"query_token": {}}
     *     }
     * )
     */
    public function userUpdateItems(request $request){
        $user = Auth::user();
        if(count($request->keys)){
        foreach ($request->keys as $response){
            $r=Key::where('assigned_id',$response)->where('custid',$user->id)->first();
            $keys=Key::find($r->id);
            $keys->status='Delivered';
            $keys->save();
         }
        }

        if(count($request->docs)){
         foreach ($request->docs as $response){
            $r=Doc::where('assigned_id',$response)->where('custid',$request->user_id)->first();
             //return 'doc ran';
             // $i++;
             //return $request->stripe;
             $docs=Doc::find($r->id);
             $docs->status='Delivered';
             $docs->save();
          }
        }
          $data=Delivery::find($request->id);
          //return $data;
          $data->status='Delivered';
          $data->save();
        //   return $data->id;
        Delivery::deliveredEmail($data->id);
          return response()->json(
            [
                'success' =>'true',
                'message' => 'updated',
                'delivery_id' => $data->id,
            ]
        );
    }
/**
     * @OA\Get(
     *     path="/api/view-user-delivery-history",
     *     tags={"delivery"},
     *     @OA\Response(response="200", description="Get users delivery history"),
     *     security={
     *         {"query_token": {}}
     *     }
     * )
     */
    public function viewUserDeliverHistory(){
        $user = Auth::user();
        $data=Delivery::where('status','Delivered')->where('customer_id',$user->id)->get();

        return $data;
    }

    public function getShippingLabel($id){
        $data=Delivery::find($id);

        $i=0;
        $j=0;
        $dec_key= json_decode($data->keys);
        $dec_doc= json_decode($data->docs);
        if(count($dec_key)){
            foreach($dec_key as $key){
                $getkey[$i]=Key::where('assigned_id',$key)->where('custid',$data->customer_id)->first();
                $i++;
            }
        }
        else{
            $getkey=null;
        }
        if(count($dec_doc)){
            foreach($dec_doc as $doc){
                $getdoc[$j]=Doc::where('custid',$data->customer_id)->where('assigned_id',$doc)->first();
                $j++;
            }
        }
        else{
            $getdoc=null;
        }
        $qr_code['qr']=DNS2D::getBarcodeHTML('http://uholu.com/api/getShippingLabelPro/'.$data->id, "QRCODE",8,8);
        //return $qr_code['qr'];
        $pdf = PDF::loadView('testdel', compact('data','getkey','getdoc','qr_code'));
        return $pdf->download('deli'.$id.'.pdf');

    }

    public function action($id){
        $data=Delivery::find($id);
        $data->status="In Transit";


        $dec_key= json_decode($data->keys);
        $dec_doc= json_decode($data->docs);
        if(count($dec_key)){
            foreach($dec_key as $key){
                $getkey=Key::where('assigned_id',$key)->where('custid',$data->customer_id)->first();
                $getkey->status="In Transit";
                $getkey->save();
            }
        }
        else{
            $getkey=null;
        }
        if(count($dec_doc)){
            foreach($dec_doc as $doc){
                $getdoc=Doc::where('custid',$data->customer_id)->where('assigned_id',$doc)->first();
                $getdoc->status="In Transit";
                $getdoc->save();
            }
        }
        else{
            $getdoc=null;
        }
        $data->save();
        return redirect('/dashboard/request');
    }

    public function updateHistoryRequest(request $request, $id){
        $data=Delivery::find($id);
        //return $data;
        $data->status=$request->status_u;
        foreach($request->key as $k){
            $key=Key::where('assigned_id',$k)->where('custid',$data->customer_id)->first();
            $key->status=$request->status_u;
            $key->save();
        }
        foreach($request->doc as $d){
            $doc=Doc::where('assigned_id',$d)->where('custid',$data->customer_id)->first();
            $doc->status=$request->status_u;
            $doc->save();
        }
        $data->save();
    }
}
