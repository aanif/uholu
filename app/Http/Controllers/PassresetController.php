<?php

namespace App\Http\Controllers;
use App\User;
use App\passreset;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use Illuminate\Http\Request;

class PassresetController extends Controller
{
    //
    public function create(request $request){
        $deleteVar=passreset::where('email',$request->email)->get();
        foreach($deleteVar as $dels){
            $dels->delete();
        }
        $add=new passreset();
        $code=rand(10000000000000,99999999999999);
        //return $code;
        $add->email=$request->email;
        $add->code=$code;
        $add->save();
        $mail['email']=$request->email;
        $mail['link']=url('/').'/reset?key='.$code;
        //return $mail['link'];
        Mail::send('mail.passResetEmail', $mail, function ($message) use ($mail) {
            $message->from('sofroo@sofroo.com.au', 'Uholu');
            $message->subject('Reset Password');
            $message->to($mail['email']);
     });
    }


    public function getemail(request $request){
        $data=passreset::where('code',$request->code)->first();
        return $data->email;
    }
    
    public function emailExists(request $request){
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
