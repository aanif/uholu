<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Key;
use App\User;
use Illuminate\Http\Request;

class keyController extends Controller
{
    //
    /**
     * @OA\Get(
     *     path="/api/get-user-keys",
     *     tags={"keys"},
     *     @OA\Response(response="200", description="Get users keys"),
     *     security={
     *         {"query_token": {}}
     *     }
     * )
     */
    public function viewKeys(){
        $user = Auth::user();
        $user=User::find($user->id);
        $keys=Key::where('custid','=',$user->id)->orderBy('assigned_id')->get();
        $keys->sortBy('assigned_id');
        return $keys;
    }

 /**
     * @OA\Post(
     *     path="/api/add-key",
     *     tags={"keys"},
     * @OA\Parameter(
     *     name="key_name",
     *     in="query",
     *     description="name of the key",
     * ),
     * @OA\Parameter(
     *     name="key_description",
     *     in="query",
     *     description="description of the key",
     * ),
     *     @OA\Response(response="200", description="add a key"),
     *     security={
     *         {"query_token": {}}
     *     }
     * )
     */
    public function create(request $request){
        $user = Auth::user();
        $user=User::find($user->id);
            $keys= new Key();
            $keys->name=$request->key_name;
            $keys->type=$request->key_description;
            $keys->status='Pending';
            $keys->custid=$user->id;
            // $user=User::find($request->user_id);
            $keys->custname=$user->name;
            $keys->stripe_id=$user->stripe_id;
            $check=Key::where('custid',$user->id)->get();
            for($i=1;$i<200;$i++){
                $counter=0;
                if(count($check)){
                    foreach($check as $unit){
                        if($unit->assigned_id!=$i){
                            $counter++;
                        }
                    }
                    if($counter==count($check)){
                        $keys->assigned_id=$i;
                        break;
                    }
                }
                else{
                    $keys->assigned_id=$i;
                    break;
                }
            }
            $keys->save();
            return response()->json(
                [
                    'success' =>'true',
                    'message' => 'Key_Created',
                ]
            );
    }

    /**
     * @OA\Post(
     *     path="/api/update-key/{key_id}",
     *     tags={"keys"},
     * @OA\Parameter(
     *     name="key_id",
     *     in="path",
     *     description="id of the key",
     * ),
     * @OA\Parameter(
     *     name="key_name",
     *     in="query",
     *     description="name of the key",
     * ),
     * @OA\Parameter(
     *     name="key_description",
     *     in="query",
     *     description="description of the key",
     * ),
     *     @OA\Response(response="200", description="update a key"),
     *     security={
     *         {"query_token": {}}
     *     }
     * )
     */
    public function update(request $request,$key_id){
        $user = Auth::user();
        $data=User::find($user->id);
        $keys=Key::find($key_id);
        if($data->id != $keys->custid){
            return response()->json(
                [
                    'message' => 'This item does not belong to you'
                ],
                400
            );
        }
        $keys->name=$request->key_name;
        $keys->type=$request->key_description;
        $keys->save();
        return response()->json(
            [
                'success' =>'true',
                'message' => 'Key_Updated',
            ]
        );

    }

    public function deleteItem($key_id){
        $item=Key::find($key_id);
        $item->delete();
        return response()->json(
            [
                'success' =>'true',
                'message' => 'Key_Deleted',
            ]
        );
    }

    public function updateAdminKey(request $request,$id){
        $keys=Key::find($id);
        $keys->name=$request->name;
        $keys->type=$request->type;
        $keys->status=$request->status;
        $keys->save();

    }

/**
     * @OA\Post(
     *     path="/api/delete-key/{key_id}",
     *     tags={"keys"},
     * @OA\Parameter(
     *     name="key_id",
     *     in="path",
     *     description="name of the key",
     * ),
     *     @OA\Response(response="200", description="delete a key"),
     *     security={
     *         {"query_token": {}}
     *     }
     * )
     */
    public function destroy($key_id){
        $user = Auth::user();
        $data=User::find($user->id);
        $keys=Key::find($key_id);
        if($data->id != $keys->custid){
            return response()->json(
                [
                    'message' => 'This item does not belong to you'
                ],
                400
            );
        }
            Key::find($key_id)->delete();
            return response()->json(
                [
                    'success' =>'true',
                    'message' => 'Key_Deleted',
                ]
            );

    }

    /**
     * @OA\Get(
     *     path="/api/get-keys-for-pickup",
     *     tags={"pickup"},
     *     @OA\Response(response="200", description="Get users keys ready for pickup"),
     *     security={
     *         {"query_token": {}}
     *     }
     * )
     */

    public function getpickup(){
        $user = Auth::user();
        $keys=Key::with('user')->where('custid',$user->id)->where(function($query){
            $query->where('status','Pending')->orWhere('status','Delivered');
        })->get();
        return $keys;
    }

    public function filterSearch(request $request)
    {
        $str2 = substr( $request->keyword , 0,3);
        if($str2=='Key' || $str2=='Doc')
        {
            $search=substr( $request->keyword , 3);
            $error=1;
        }
        else{
            $search=$request->keyword;
            $error=0;
        }
        $dat = [];
        $dat['name']=Key::where('name', 'like', '%' . $request->keyword . '%')->get();
        $dat['type']=Key::where('type', 'like', '%' . $request->keyword . '%')->get();
        if($error)
        {$dat['id']=Key::where('assigned_id', 'like',  $search . '%')->get();}
        else{
            $dat['id']=Key::where('assigned_id', 'like', '%' . $search . '%')->get();
        }

        $all=$dat['name']->merge($dat['type'])->merge($dat['id']);
        $keys = collect($all)->sortBy('assigned_id');
        return $keys;
    }

    /**
     * @OA\Get(
     *     path="/api/get-keys-for-delivery",
     *     tags={"delivery"},
     *     @OA\Response(response="200", description="Get users keys ready for delivery"),
     *     security={
     *         {"query_token": {}}
     *     }
     * )
     */
    public function getdelivery(){
        $user = Auth::user();
        $keys=Key::with('user')->where('custid',$user->id)->where('status','Secured')->get();
        return $keys;
    }

    public function getAllKeys(){
        $keys=Key::with('user')->get();
        return $keys;
    }

    public function keyCounter(){
        $data=Key::all();
        return count($data);
    }

    public function userKeyCounter($id){
        $data=Key::where('custid',$id)->get();
        return count($data);
    }
}
