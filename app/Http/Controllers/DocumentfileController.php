<?php

namespace App\Http\Controllers;
use App\documentfile;
use App\Doc;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class DocumentfileController extends Controller
{
    //
    public function uploadFile(Request $request,$id) {
        $data=Doc::find($id);

        $file = $request->file;
        $filename = $file->getClientOriginalName();
        if($file->getClientMimeType()=='application/pdf' || $file->getClientMimeType()=='image/jpeg' || $file->getClientMimeType()=='image/png' || $file->getClientMimeType()=='application/octet-stream'){

            $newname= Storage::disk('public')->put('/', $file);

            $data->filename=url('/').'/storage/'.$newname;
            $data->save();

        return response()->json([
            'success' => true ]);
        // ], 500);
    }
        else{
            return response()->json([
                'success' => false ]);
        }
    }
}
