<?php

namespace App\Http\Controllers;
use App\Doc;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Http\Request;

class docController extends Controller
{
    //
    /**
     * @OA\Get(
     *     path="/api/get-user-docs",
     *     tags={"docs"},
     *     @OA\Response(response="200", description="Get users docs"),
     *     security={
     *         {"query_token": {}}
     *     }
     * )
     */
    public function viewDocs(){
        $user = Auth::user();
        $data=User::find($user->id);
        $docs=Doc::where('custid','=',$data->id)->orderBy('assigned_id')->get();
        //$docs = collect($docs)->sortBy('assigned_id');
        return $docs;
    }

    /**
     * @OA\Post(
     *     path="/api/add-document",
     *     tags={"docs"},
     * @OA\Parameter(
     *     name="doc_name",
     *     in="query",
     *     description="name of the doc",
     * ),
     * @OA\Parameter(
     *     name="doc_description",
     *     in="query",
     *     description="description of the doc",
     * ),
     *     @OA\Response(response="200", description="add a doc"),
     *     security={
     *         {"query_token": {}}
     *     }
     * )
     */

    public function create(request $request){
        $user = Auth::user();
        $user=User::find($user->id);
        $docs= new Doc();
        $docs->name=$request->doc_name;
        $docs->type=$request->doc_description;
        $docs->status='Pending';
        $docs->custid=$user->id;
        // $user=User::find($request->user_id);
        $docs->custname=$user->name;
        $docs->stripe_id=$user->stripe_id;

        $check=Doc::where('custid',$user->id)->get();
            for($i=1;$i<200;$i++){
                $counter=0;
                if(count($check)){
                    foreach($check as $unit){
                        if($unit->assigned_id!=$i){
                            $counter++;
                        }
                    }
                    if($counter==count($check)){
                        $docs->assigned_id=$i;
                        break;
                    }
                }
                else{
                    $docs->assigned_id=$i;
                    break;
                }
            }

        $docs->save();
         return response()->json(
            [
                'success' =>'true',
                'message' => 'Doc_Created',
            ]
        );
    }

/**
     * @OA\Post(
     *     path="/api/update-doc/{doc_id}",
     *     tags={"docs"},
     * @OA\Parameter(
     *     name="doc_id",
     *     in="path",
     *     description="id of the doc",
     * ),
     * @OA\Parameter(
     *     name="doc_name",
     *     in="query",
     *     description="name of the doc",
     * ),
     * @OA\Parameter(
     *     name="doc_description",
     *     in="query",
     *     description="description of the doc",
     * ),
     *     @OA\Response(response="200", description="update a doc"),
     *     security={
     *         {"query_token": {}}
     *     }
     * )
     */
    public function update(request $request,$doc_id){
        $user = Auth::user();
        $data=User::find($user->id);
        $docs=Doc::find($doc_id);
        if($data->id != $docs->custid){
            return response()->json(
                [
                    'message' => 'This item does not belong to you'
                ],
                400
            );
        }
        $docs->name=$request->doc_name;
        $docs->type=$request->doc_description;
        $docs->save();
        return response()->json(
            [
                'success' =>'true',
                'message' => 'Doc_Updated',
            ]
        );

    }

    /**
     * @OA\Post(
     *     path="/api/delete-doc/{doc_id}",
     *     tags={"docs"},
     * @OA\Parameter(
     *     name="doc_id",
     *     in="path",
     *     description="name of the doc",
     * ),
     *     @OA\Response(response="200", description="delete a doc"),
     *     security={
     *         {"query_token": {}}
     *     }
     * )
     */

    public function deleteItem($doc_id){
        $item=Doc::find($doc_id);
        $item->delete();
        return response()->json(
            [
                'success' =>'true',
                'message' => 'Doc_Deleted',
            ]
        );
    }


    public function updateAdminDoc(request $request,$id){
        $docs=Doc::find($id);
        $docs->name=$request->name;
        $docs->type=$request->type;
        $docs->status=$request->status;
        $docs->save();

    }

    public function destroy($doc_id){
        $user = Auth::user();
        $data=User::find($user->id);
        $docs=Doc::find($doc_id);
        if($data->id != $docs->custid){
            return response()->json(
                [
                    'message' => 'This item does not belong to you'
                ],
                400
            );
        }
        Doc::find($doc_id)->delete();
        return response()->json(
            [
                'success' =>'true',
                'message' => 'Doc_Deleted',
            ]
        );
    }

    /**
     * @OA\Get(
     *     path="/api/get-docs-for-pickup",
     *     tags={"pickup"},
     *     @OA\Response(response="200", description="Get users docs ready for pickup"),
     *     security={
     *         {"query_token": {}}
     *     }
     * )
     */

    public function getpickup(){
        $user = Auth::user();
        $docs=Doc::with('user')->where('custid', $user->id)->where(function($query){
                    $query->where('status','Pending')->orWhere('status','Delivered');
                })->get();
        return $docs;
    }

    /**
     * @OA\Get(
     *     path="/api/get-docs-for-delivery",
     *     tags={"delivery"},
     *     @OA\Response(response="200", description="Get users docs ready for delivery"),
     *     security={
     *         {"query_token": {}}
     *     }
     * )
     */

    public function getdelivery(){
        $user = Auth::user();
        $docs=Doc::with('user')->where('custid',$user->id)->where('status','Secured')->get();
        return $docs;
    }

    public function filterSearch(request $request)
    {
        $str2 = substr( $request->keyword , 0,3);
        if($str2=='Doc' || $str2=='doc')
        {
            $search=substr( $request->keyword , 3);
            $error=1;
        }
        else{
            $search=$request->keyword;
            $error=0;
        }
        $dat = [];
        $dat['name']=Doc::where('name', 'like', '%' . $request->keyword . '%')->get();
        $dat['type']=Doc::where('type', 'like', '%' . $request->keyword . '%')->get();
        if($error)
        {$dat['id']=Doc::where('assigned_id', 'like',  $search . '%')->get();}
        else{
            $dat['id']=Doc::where('assigned_id', 'like', '%' . $search . '%')->get();
        }
        $all=$dat['name']->merge($dat['type'])->merge($dat['id']);
        $docs = collect($all)->sortBy('assigned_id');
        return $docs;
    }


    public function getAllDocs(){
        $docs=Doc::with('user')->get();
        return $docs;
    }
    public function docCounter(){
        $data=Doc::all();
        return count($data);
    }
    public function userDocCounter($id){
        $data=Doc::where('custid',$id)->get();
        return count($data);
    }

}
