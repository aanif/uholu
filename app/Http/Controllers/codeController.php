<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\code;
use Twilio;

class codeController extends Controller
{
    /**
     * @OA\Post(
     *     path="/api/send-code",
     *     tags={"twilio-code"},
     * * @OA\Parameter(
     *     name="phone",
     *     in="query",
     *     description="number to send the code to",
     * ),
     *     @OA\Response(response="200", description="send the code to the phone numbers"),
     *     security={
     *         {"query_token": {}}
     *     }
     * )
     */
    public function store(request $request)
    {
        $add=new code();
        $code=rand(100000,999999);
        $message="Hi, Welcome to Uholu. Your verification code is ".$code;
        //$code=123123;
        Twilio::message($request->phone, $message);
        //Twilio::from('call_center')->message($request->phone, $message);
        $add->phone=$request->phone;
        $add->checkcsode=$code;
        $add->save();
        return response()->json(
            [
                'success' =>'true',
                'message' => 'Code_Sent',
            ]
        );
    }

    /**
     * @OA\Post(
     *     path="/api/verify-code",
     *     tags={"twilio-code"},
     * @OA\Parameter(
     *     name="phone",
     *     in="query",
     *     description="number to send the code to",
     * ),
     * @OA\Parameter(
     *     name="verification_code",
     *     in="query",
     *     description="code recieved on phone",
     * ),
     *     @OA\Response(response="200", description="verify the code sent to the phone numbers"),
     *     security={
     *         {"query_token": {}}
     *     }
     * )
     */

    public function check(request $request)
    {
        $checks=code::where('phone','=',$request->phone)->orderBy('created_at','desc')->first();
        //return $checks;

       if($checks->checkcsode==$request->verification_code)
        {
          $dt=  $checks->updated_at->diffInMinutes();

         if($dt<=30)
          {
             $checks->delete();
             $ver=code::where('phone','=',$request->phone)->delete();
             //return $ver;
              return response()->json(
                [
                    'success' =>'true',
                    'message' => 'Verified',
                ]
            );

            }
           else
           {
            $checks->delete();
               return response()->json('expired');
               return response()->json(
                [
                    'success' =>'false',
                    'message' => 'Code_Expired',
                ]
            );
            }
        }
        else{
            $checks->delete();
            return response()->json('fail');
            return response()->json(
                [
                    'success' =>'false',
                    'message' => 'Invalid_Code',
                ]
            );
        }

    }

}
