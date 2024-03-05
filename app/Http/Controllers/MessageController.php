<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    //
    public function create(request $request){
        $data= new Message();
        $data->customer_id=$request->id;
        $data->customer_name=$request->name;
        $data->message=$request->message;
        $data->flag=false;
        $data->save();
    }

    /**
     * @OA\delete(
     *     path="/api/delete-message",
     *     tags={"messages"},
     * @OA\Parameter(
     *     name="id",
     *     in="path",
     *     description="ID of the message",
     * ),
     *     @OA\Response(response="200", description="delete users messages"),
     *     security={
     *         {"query_token": {}}
     *     }
     * )
     */
    public function delete($id){
        $data=Message::find($id);
        $data->delete();
        return response()->json(
            [
                'message' => 'Marked_as_read',
            ]
        );
    }

    public function view(){
        $data=Message::with('user')->get();
        return $data;
    }

    /**
     * @OA\Get(
     *     path="/api/user-messages",
     *     tags={"messages"},
     *     @OA\Response(response="200", description="Get users messages"),
     *     security={
     *         {"query_token": {}}
     *     }
     * )
     */
    public function userView(){
        $user = Auth::user();
        $data=Message::with('user')->where('customer_id',$user->id)->get();
        return $data;
    }

    public function userViewCount($id){
        $data=Message::where('customer_id',$id)->get();
        return count($data);
    }

/**
     * @OA\Get(
     *     path="/api/message-mark-as-read/{id}",
     *     tags={"messages"},
     * @OA\Parameter(
     *     name="id",
     *     in="path",
     *     description="ID of the message",
     * ),
     *     @OA\Response(response="200", description="Mark users message as read"),
     *     security={
     *         {"query_token": {}}
     *     }
     * )
     */
    public function markAsRead($id){
        $data=Message::find($id);
        //return $data;
        $data->flag='1';
        $data->save();
        return response()->json(
            [
                'message' => 'Marked_as_read',
            ]
        );
    }

    /**
     * @OA\Get(
     *     path="/api/check-new-messages",
     *     tags={"messages"},
     *     @OA\Response(response="200", description="Check if user has new message"),
     *     security={
     *         {"query_token": {}}
     *     }
     * )
     */

    public function messageNotification()
    {
        $user = Auth::user();
        $data=Message::where('customer_id',$user->id)->get();
        if($user->message_counter < count($data)){
            $difference = count($data) - $user->message_counter;
            return response()->json(
                [
                    'new_message' => 'true',
                    'quantity' => $difference,
                ]
            );
        }
        return response()->json(
            [
                'new_message' => 'false',
                'quantity' => 0,
            ]
        );
    }
}
