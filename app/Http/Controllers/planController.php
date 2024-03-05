<?php
namespace App\Http\Controllers;
use Auth;
use App\Plan;
use App\User;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Laravel\Cashier\Cashier;
use Config;
// use Illuminate\Support\Facades\config;

class planController extends Controller
{
    public function __construct(){
        \Stripe\Stripe::setApiKey(config('app.stripe.secret'));
    }

    public function index()
    {
        if(Auth::check()){
            if(auth()->user()->role=='admin' && auth()->user()->parent_id=='head'){
        $responses= \Stripe\Plan::all(['limit' => 8]);

        $plancheck=Plan::all();
         if($plancheck->isEmpty()){

        foreach ($responses->data as $response){

        foreach($response->tiers as $tier){
            if($tier->up_to<100){
                        $plans = new Plan();
                    $plans->name=$response->object;
                    $plans->stripe_plan=$response->id;
                    $plans->catagory=$response->nickname;
                    $plans->upto=$tier->up_to;
                    $plans->cost=$tier->flat_amount;
                    if($response->nickname=='docs yearly' && $tier->up_to=='2'){
                        $plans->plan_class='Basic';
                        $plans->quantity='2';
                    }
                    if($response->nickname=='docs yearly' && $tier->up_to=='4'){
                        $plans->plan_class='Standard';
                        $plans->quantity='4';
                    }
                    if($response->nickname=='docs yearly' && !($tier->up_to)){
                        $plans->plan_class='Professional';
                        $plans->quantity='6';
                    }
                    if($response->nickname=='keys yearly' && $tier->up_to=='1'){
                        $plans->plan_class='Basic';
                        $plans->quantity='1';
                    }
                    if($response->nickname=='keys yearly' && $tier->up_to=='3'){
                        $plans->plan_class='Standard';
                        $plans->quantity='3';
                    }
                    if($response->nickname=='keys yearly' && !($tier->up_to)){
                        $plans->plan_class='Professional';
                        $plans->quantity='5';
                    }
                    if($response->nickname=='docs business' && $tier->up_to=='5'){
                        $plans->plan_class='Basic';
                        $plans->quantity='5';
                    }
                    if($response->nickname=='docs business' && $tier->up_to=='10'){
                        $plans->plan_class='Standard';
                        $plans->quantity='10';
                    }
                    if($response->nickname=='docs business' && $tier->up_to=='20'){
                        $plans->plan_class='Plus';
                        $plans->quantity='20';
                    }
                    if($response->nickname=='docs business' && $tier->up_to=='50'){
                        $plans->plan_class='Premium';
                        $plans->quantity='50';
                    }
                    if($response->nickname=='docs business' && !($tier->up_to)){
                        $plans->plan_class='Gold';
                        $plans->quantity='100';
                    }
                    if($response->nickname=='keys business' && $tier->up_to=='5'){
                        $plans->plan_class='Basic';
                        $plans->quantity='5';
                    }
                    if($response->nickname=='keys business' && $tier->up_to=='10'){
                        $plans->plan_class='Standard';
                        $plans->quantity='10';
                    }
                    if($response->nickname=='keys business' && $tier->up_to=='20'){
                        $plans->plan_class='Plus';
                        $plans->quantity='20';
                    }
                    if($response->nickname=='keys business' && $tier->up_to=='50'){
                        $plans->plan_class='Premium';
                        $plans->quantity='50';
                    }
                    if($response->nickname=='keys business' && !($tier->up_to)){
                        $plans->plan_class='Gold';
                        $plans->quantity='100';
                    }

                    $plans->save();
         }
        }}
        return 'plans added';
     }
        else{
        foreach ($responses->data as $response){

                foreach($response->tiers as $tier){


        $ticket= Plan::where('catagory','=',$response->nickname)->where('upto',$tier->up_to)->get();
        $ticket->cost=$tier->flat_amount;
        echo "amount updated or unchanged /";
        //return $ticket[0];

              }
        }}
    }
    else{
        return "log in as admin";
    }
}
    else{
        return "Not logged In";
    }
    }


    public function create(request $request){
        return \Stripe\Plan::create([
            'amount' => $request->amount,
            'currency' => $request->currency,
            'interval' => $request->interval,
            'product' => ['name' => $request->prodName],
          ]);

    }

    public function retrieve($id){

    }

    public function update($id,request $request){

    }
    public static function delete($id){
        // \Stripe\Stripe::setApiKey(config('app.stripe.secret'));
        // $stripe = new \Stripe\StripeClient(
        //     config('app.stripe.secret')
        //   );
        // return  \Stripe\Plan::delete($id, []);
        //   $stripe->plans->delete($id, []);
        // return $responses;

        $stripe = new \Stripe\StripeClient(
            config('app.stripe.secret')
          );
          $stripe->plans->delete($id, []);
        }

    public function show(){
        return \Stripe\Plan::all();
    }

    public function viewPlans()
    {
        $plans=Plan::all();
        return $plans;
    }

    public function getProgress(request $request){
            $progress=User::find($request->id);
            $r[0]=$progress->profile_check_1;
            $r[1]=$progress->profile_check_2;
            $r[2]=$progress->profile_check_3;
            return $r;
        }

    public function currPackage(request $request){
        if($request->docid)
            {
            if($request->docquantity >= '100'){
                $ret[0]='Gold';
                $ret[1]=$request->docquantity*500;
            }
            else if($request->docquantity < '100'){
            $data=Plan::where('stripe_plan',$request->docid)->where('quantity',$request->docquantity)->first();
            //return $data;
            $ret[0]=$data->plan_class;
            $ret[1]=$data->cost;}}
        if($request->keyid){
            if($request->keyquantity >= '100'){
                $ret[2]='Gold';
                $ret[3]=$request->keyquantity*650;
            }
            else if($request->keyquantity < '100'){
            $datas=Plan::where('stripe_plan',$request->keyid)->where('quantity',$request->keyquantity)->first();
            $ret[2]=$datas->plan_class;
            $ret[3]=$datas->cost;}}
            return $ret;
    }


}
