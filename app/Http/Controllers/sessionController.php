<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class sessionController extends Controller
{
    //
    public function storePackage(request $request)
    {
        if(!is_null($request->keys_id))
            {$request->session()->put('keys_id', $request->keys_id);
             $request->session()->put('keys_quantity', $request->keys_quantity);}
        // else
        //     {$request->session()->put('keys_id', null);
        //      $request->session()->put('keys_quantity', null);}


        if(!is_null($request->docs_id))
            {$request->session()->put('docs_id', $request->docs_id);
             $request->session()->put('docs_quantity', $request->docs_quantity);}
        else
            {$request->session()->put('docs_id', null);
             $request->session()->put('docs_quantity', null);

            }

            $request->session()->put('type', $request->type);
            $request->session()->put('type_pre',$request->type);
        return $request->docs_id;



    }

    public function getPackage(request $request)
    {
        $value[0] = $request->session()->pull('keys_id');
        $value[1] = $request->session()->pull('keys_quantity');
        $value[2] = $request->session()->pull('docs_id');
        $value[3] = $request->session()->pull('docs_quantity');
        $value[4] = $request->session()->pull('type');

        return $value;


    }


}
