<?php

namespace App\Http\Controllers;
use App\Pickup;
use App\Doc;
use App\Key;
use App\payments;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Milon\Barcode\DNS2D;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class pickupController extends Controller
{
    //
    /**
     * @OA\Post(
     *     path="/api/create-pickup",
     *     tags={"pickup"},
     * @OA\Parameter(
     *     name="pickup_keys",
     *     in="query",
     *     description="assigned_ids of keys for pickup in form of an array",
     * ),
     * @OA\Parameter(
     *     name="pickup_docs",
     *     in="query",
     *     description="assigned_ids of docs for pickup in form of an array",
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
     *     name="pickup_type",
     *     in="query",
     *     description="normal or urgent pickup",
     * ),
     * @OA\Parameter(
     *     name="pickup_cost",
     *     in="query",
     *     description="cost of pickup, 2500 for normal, 3500 for urgent",
     * ),
     *     @OA\Response(response="200", description="Create pickup request"),
     *     security={
     *         {"query_token": {}}
     *     }
     * )
     */
    public function create(request $request)
    {
        $user = Auth::user();
        $user=User::find($user->id);
        $data=new Pickup();
        $data->customer_id=$user->id;
        $data->customer_id_stripe=$user->stripe_id;
        $data->keys=json_encode($request->pickup_keys);
        $data->docs=json_encode($request->pickup_docs);
        $data->unit=$request->address_unit;
        $data->street=$request->address_street;
        $data->city=$request->address_city;
        $data->zip=$request->address_zip;
        $details='Pick up payment';
        if($request->delivery_info)
        {
            $data->info=$request->delivery_info;
        }
        $data->type=$request->pickup_type;
        $data->status='Pick Up Requested';
        if($request->pickup_keys){
            foreach ($request->pickup_keys as $response){
                $keys=Key::where('assigned_id',$response)->where('custid',$user->id)->first();
                $keys->status='Pick Up Requested';
                $keys->save();
             }
        }
        if($request->pickup_docs){
            foreach ($request->pickup_docs as $response){
                $docs=Doc::where('assigned_id',$response)->where('custid',$user->id)->first();
                $docs->status='Pick Up Requested';
                $docs->save();
            }
        }
        //  $user=User::find($request->user_id);
         if($user->payment_counter == 1){
            $data->cost=0;
         }
         else{
            $data->cost=$request->pickup_cost;
            payments::paymentIntent($request->pickup_cost, $user->id, $details);
         }
         $data->role=$user->role;
         $user->payment_counter+=1;
         $data->name=$user->name;
         $data->save();
         $user->save();
        //  Pickup::emailPickup($data->id);
        //  Pickup::adminEmailPickup($data->id);
         return response()->json(
            [
                'success' =>'true',
                'message' => 'Pickup_Requested',
                'pickup_id' => $data->id,
            ]
        );



    }

    public function updatePrequest(request $request, $id){
        $data=Pickup::find($id);
        //return $data;
        $data->name=$request->name;
        $data->cost=$request->cost;
        $data->unit=$request->unit;
        $data->street=$request->street;
        $data->city=$request->city;
        $data->zip=$request->zip;
        if($request->info)
        {$data->info=$request->info;}
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

    public function viewRequestsPick(){
        $data=Pickup::with('user')->where('status','Pick Up Requested')->orWhere('status','In Transit')->get();

        return $data;
    }

    /**
     * @OA\Get(
     *     path="/api/view-user-pickup-requests",
     *     tags={"pickup"},
     *     @OA\Response(response="200", description="Get users pickup requests"),
     *     security={
     *         {"query_token": {}}
     *     }
     * )
     */
    public function viewRequestsPickUser(){
        $user = Auth::user();
        $data=Pickup::with('user')->where('status','Pick Up Requested')->Where('customer_id',$user->id)->get();

        return $data;
    }

    public function viewRequestsPickHistory(){
        $data=Pickup::with('user')->where('status','Secured')->orWhere('status','Failed')->get();

        return $data;
    }

    public function pickupCounter(){
        $data=Pickup::where('status','Pick Up Requested')->orWhere('status','In Transit')->get();
        return count($data);
    }

/**
     * @OA\Get(
     *     path="/api/view-user-Pickup-history",
     *     tags={"pickup"},
     *     @OA\Response(response="200", description="Get users pickup history"),
     *     security={
     *         {"query_token": {}}
     *     }
     * )
     */
    public function viewUserPickHistory(){
        $user = Auth::user();
        $data=Pickup::with('user')->where('status','Secured')->where('customer_id',$user->id)->get();

        return $data;
    }



    public function viewPickupPdf(request $request,$id){
        $items['user']=User::find($id);
        $items['pickup']=Pickup::find($request->id);
        $items['items']=Pickup::where('id',0)->get();
        $id_keys=$request->keys1;
        $id_docs=$request->docs1;
        //return $id_docs;
        foreach($id_keys as $keys){
            $key_details=Key::where('assigned_id',$keys)->where('custid',$id)->first();
            $key_details['item_type']='Key';
            $items['items']->push($key_details);
        }
        foreach($id_docs as $docs){
            $doc_details=Doc::where('assigned_id',$docs)->where('custid',$id)->first();
            $doc_details['item_type']='Doc';
            $items['items']->push($doc_details);
        }
        $items['qr']=DNS2D::getBarcodeHTML('http://uholu.com/api/pickupLabelCustomer/'.$request->id, "QRCODE",4,4);
        //return $items;

        //return view("test/pickupLabel");
        $pdf = PDF::loadView('test/pickupLabel', $items)->setPaper('a4', 'portrait')->stream('download.pdf');
        // $pdf = PDF::loadView('testdel', compact('items'));
        return $pdf;
        //  return $pdf->download(Carbon::now().'- pick'.$request->id.'.pdf');
        // return $pdf->download('deli'.$id.'.pdf');
    }

    public function qrFunction($id){
      if (auth()->user()->role=='admin') {
        $data=Pickup::find($id);
        $data->status="Secured";


        $dec_key= json_decode($data->keys);
        $dec_doc= json_decode($data->docs);
        if(count($dec_key)){
            foreach($dec_key as $key){
                $getkey=Key::where('assigned_id',$key)->where('custid',$data->customer_id)->first();
                $getkey->status="Secured";
                $getkey->save();
            }
        }
        else{
            $getkey=null;
        }
        if(count($dec_doc)){
            foreach($dec_doc as $doc){
                $getdoc=Doc::where('custid',$data->customer_id)->where('assigned_id',$doc)->first();
                $getdoc->status="Secured";
                $getdoc->save();
            }
        }
        else{
            $getdoc=null;
        }
        $data->save();
        return redirect('/dashboard/history?reqid=pick'.$id);
    }
    else{
        return abort(403, 'You are not authorized to access this');
    }
    }

    public function updateHistoryRequest(request $request, $id){
        $data=Pickup::find($id);

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
