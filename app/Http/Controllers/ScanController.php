<?php

namespace App\Http\Controllers;
use App\Scan;
use App\Doc;
use App\payments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScanController extends Controller
{
    //
    /**
 * @urlParam  id required The ID of the post.
 * @bodyParam  doc_id required integer The id of the documented to be scaned
 */
    public function create(request $request){
        $user = Auth::user();
        $data=new Scan();
        $doc=Doc::find($request->doc_id);
        $doc->request=true;
        $data->user_id=$user->id;
        $data->doc_id=$request->doc_id;
        $data->assigned_id=$doc->assigned_id;
        $data->user_name=$doc->custname;
        $data->save();
        $doc->save();
        payments::paymentIntent(2500, $user->id, 'Scan payment');
        payments::emailScan($data->id);
        return response()->json(
            [
                'success' =>'true',
                'message' => 'scan_request_sent',
            ]
        );
    }

    public function getActive(){
        $data=Scan::with('user')->where('filename',null)->get();
        return $data;
    }

    public function scanActiveCount(){
        $data=Scan::with('user')->where('filename',null)->get();
        return count($data);
    }

    public function getInactive(){
        $data=Scan::with('user')->where('filename','!=',null)->get();
        return $data;
    }

    public function completedRequest(request $request,$id){
        $data=Scan::find($id);
        $doc=Doc::find($request->doc_id);
        $data->filename=$doc->filename;
        $doc->request=null;
        $data->save();
        $doc->save();

    }
}
