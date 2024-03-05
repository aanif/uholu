<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class cardController extends Controller
{
    //

    public function __construct(){
        \Stripe\Stripe::setApiKey(config('app.stripe.secret'));
    }

    public function index($id){
        $cards = \Stripe\Customer::allSources(
            $id,
            [
              'limit' => 3,
              'object' => 'card',
            ]
          );
          return $cards;


    }

    public function create(request $request,$id){

        $card = \Stripe\Customer::createSource(
            $id,
            [
              'source' => $request->id,
              'source'=>['object'=>$request->object],
              'source'=>['number'=>$request->last4],
              'source'=>['exp_month'=>$request->exp_month],
              'source'=>['exp_year'=>$request->exp_year]
            ]
          );
          return $card;
        // return $request;


    }

    public function retrieve($id,$idc){

        return \Stripe\Customer::retrieveSource(
           $id,
           $idc
          );

    }

    public function update(request $request, $id, $idc){

        $card=\Stripe\Customer::updateSource(
            $id,
            $idc,
            [
              //'metadata' => ['order_id' => '6735'],
            ]
          );
          return $card;

    }

    public function delete($id, $idc){
       $card= \Stripe\Customer::deleteSource(
            $id,
            $idc
          );
          return $card;
    }



}
