<?php

namespace App\Http\Controllers;
use App\payments;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    //
    public function create(request $request){
        $data=new payments();
        $data->user_id=$request->user_id;
        $data->description=$request->description;
        $data->amount=$request->amount;
        $data->save();
    }
/**
     * @OA\Get(
     *     path="/api/get-payments",
     *     tags={"payment"},
     *     @OA\Response(response="200", description="Get users payment history"),
     *     security={
     *         {"query_token": {}}
     *     }
     * )
     */
    public function getUserPayments(){
        $user = Auth::user();
        $data=payments::where('user_id',$user->id)->get();
        return $data;
    }

}
