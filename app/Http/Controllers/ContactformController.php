<?php

namespace App\Http\Controllers;
use App\Contactform;
use Illuminate\Http\Request;

class ContactformController extends Controller
{
    //
    /**
     * @OA\Post(
     *     path="/api/contact-form-message-create",
     *     tags={"contact-form"},
     * @OA\Parameter(
     *     name="name",
     *     in="query",
     *     description="name of the user",
     * ),
     * @OA\Parameter(
     *     name="email",
     *     in="query",
     *     description="email of the user",
     * ),
     * @OA\Parameter(
     *     name="phone",
     *     in="query",
     *     description="phone number of the user",
     * ),
     * @OA\Parameter(
     *     name="message",
     *     in="query",
     *     description="mmessage",
     * ),
     *     @OA\Response(response="200", description="Send a query from contact form"),
     * )
     */
    public function create(request $request){
        $data=new Contactform();
        $data->name=$request->name;
        $data->email=$request->email;
        $data->phone=$request->phone;
        $data->message=$request->message;
        $data->flag=false;
        $data->save();
        return response()->json(
            [
                'success' =>'true',
                'message' => 'Contact_Message_Send',
            ]
        );
    }

    public function view(){
        $data=Contactform::all();
        return $data;
    }

    public function counter(){
        $data=Contactform::all();
        return count($data);
    }

    public function deleteForm($id){
        $data=Contactform::find($id);
        $data->delete();
    }

    public function upgrade($id){
        $data=Contactform::find($id);
        $data->flag=true;
        $data->save();
    }
}
