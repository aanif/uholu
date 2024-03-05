<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\customerSupport;
use App\User;
use Illuminate\Support\Facades\Auth;

class CustomerSupportController extends Controller
{
    //
/**
     * @OA\Post(
     *     path="/api/customer-support-create",
     *     tags={"customer-support"},
     * @OA\Parameter(
     *     name="subject",
     *     in="query",
     *     description="subject of the message",
     * ),
     * @OA\Parameter(
     *     name="message",
     *     in="query",
     *     description="message",
     * ),
     *     @OA\Response(response="200", description="send admin a message from customer support tab"),
     *     security={
     *         {"query_token": {}}
     *     }
     * )
     */
    public function create(request $request){
        $user = Auth::user();
        $data= new customerSupport();
        $data->user_id=$user->id;
        $data->user_name=$user->name;
        $data->user_email=$user->email;
        $data->user_role=$user->role;
        $data->subject=$request->subject;
        $data->message=$request->message;
        $data->flag=false;
        $data->save();
        return response()->json(
            [
                'success' =>'true',
                'message' => 'Support_message_sent',
            ]
        );
    }

    public function delete($id){
        $data=customerSupport::find($id);
        $data->delete();
    }

    public function view(){
        $data=customerSupport::all();
        return $data;
    }

//Repush this controller

    public function ViewCount(){
        $data=customerSupport::all();
        return count($data);
    }


    public function markAsRead($id){
        $data=customerSupport::find($id);
        $data->flag='1';
        $data->save();
    }

    public function updatesupport(request $request,$id){
        $data=User::find($id);
        $data->support_counter=$request->new_value;
        $data->save();
    }
}
