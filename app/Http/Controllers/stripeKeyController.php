<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class stripeKeyController extends Controller
{

    public function view(){

       $r= config('app.stripe.key');
        return $r;
    }
    //
}
