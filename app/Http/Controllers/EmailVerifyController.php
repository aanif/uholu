<?php

namespace App\Http\Controllers;
use App\User;
use App\EmailVerify;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use Illuminate\Http\Request;

class EmailVerifyController extends Controller
{
    //
    /**
     * @OA\Post(
     *     path="/api/email-verification",
     *     tags={"email-verification"},
     * @OA\Parameter(
     *     name="email",
     *     in="query",
     *     description="email ID",
     * ),
     *     @OA\Response(response="200", description="Send verification email"),
     *     security={
     *         {"query_token": {}}
     *     }
     * )
     */
    public function create(request $request){
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


    public function getemailVerify(request $request){
        $data=EmailVerify::where('code',$request->code)->first();
        return $data->email;
    }

    public function emailExistsVerify(request $request){
        $data=User::where('email',$request->email)->get();
        //return $data;
        if(count($data)){
            return 'exists';
        }
        else{
            return 'new';
        }
    }
}
