<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

    // your routes here

//Route::group(['middleware' => ['web']], function () {
Route::group(['middleware' => 'auth'], function (){

    Route::get('/dashboard', function () {
        if(auth()->user()->payment_counter==0)
        {return redirect('/packages');}
        else {
            return view('dash-testing');
        }

    })->name('dashboard');

    Route::get('/payment', function(){
        if(auth()->user()->payment_counter){
            return redirect('/dashboard');
        }
        else{
            if(auth()->user()->phone){
                return view('onemoretest');
            }
            else{
                return redirect('/contactnumber');
            }
        }

        });


    Route::get('/dashboard/profile',function(){
            if(auth()->user()->payment_counter==0){
                return redirect('/packages');
            }
            else{
                return view('profile');
            }
            //return view('profile');

                });


    Route::get('/dashboard/pickup',function(){
        if(auth()->user()->email_verified_at){
            if(auth()->user()->payment_counter==0){
                return redirect('/packages');
            }
            else{
                // if(auth()->user()->profile_check_1 && auth()->user()->profile_check_2 && auth()->user()->profile_check_3 && auth()->user()->status=="Approved")
                // {
                    return view('requestpickup');
                // }
                // else{
                //     return redirect('/dashboard');
                // }
            }
        }
        else{
            return redirect('/dashboard');
        }
                });


    Route::get('/dashboard/delivery',function(){
        if(auth()->user()->email_verified_at){
            if(auth()->user()->payment_counter==0){
                return redirect('/packages');
            }
            else{
                // if(auth()->user()->profile_check_1 && auth()->user()->profile_check_2 && auth()->user()->profile_check_3 && auth()->user()->status=="Approved")
                // {
                    return view('requestdelivery');
                // }
                // else{
                //     return redirect('/dashboard');
                // }
            }
        }
        else{
            return redirect('/dashboard');
        }
                //return view('requestdelivery');
                });


                Route::get('/dashboard/messages',function(){
                    if(auth()->user()->payment_counter==0){
                        return redirect('/packages');
                    }
                    else{
                        return view('messages');

                    }
                        //return view('requestdelivery');
                        });

                Route::get('/dashboard/activeRequest',function(){
                    if(auth()->user()->email_verified_at){
                    if(auth()->user()->payment_counter==0){
                        return redirect('/packages');
                    }
                    else{
                        // if(auth()->user()->profile_check_1 && auth()->user()->profile_check_2 && auth()->user()->profile_check_3 && auth()->user()->status=="Approved")
                        // {
                            return view('userActiveRequest');
                        // }
                        // else{
                        //     return redirect('/dashboard');
                        // }
                    }
                }
                else{
                    return redirect('/dashboard');
                }
                        //return view('requestdelivery');
                        });


                Route::get('/dashboard/HistoryRequest',function(){
                    if(auth()->user()->email_verified_at){
                            if(auth()->user()->payment_counter==0){
                                return redirect('/packages');
                            }
                            else{
                                // if(auth()->user()->profile_check_1 && auth()->user()->profile_check_2 && auth()->user()->profile_check_3 && auth()->user()->status=="Approved")
                                // {
                                    return view('userRequestHistory');
                                // }
                                // else{
                                //     return redirect('/dashboard');
                                // }
                            }
                        }
                        else{
                            return redirect('/dashboard');
                        }
                                //return view('requestdelivery');
                                });

                Route::get('/dashboard/paymentHistory',function(){
                                    if(auth()->user()->email_verified_at){
                                            if(auth()->user()->payment_counter==0){
                                                return redirect('/packages');
                                            }
                                            else{
                                                // if(auth()->user()->profile_check_1 && auth()->user()->profile_check_2 && auth()->user()->profile_check_3 && auth()->user()->status=="Approved")
                                                // {
                                                    return view('paymentHistory');
                                                // }
                                                // else{
                                                //     return redirect('/dashboard');
                                                // }
                                            }
                                        }
                                        else{
                                            return redirect('/dashboard');
                                        }
                                                //return view('requestdelivery');
                                                });



                Route::get('/dashboard/customersupport',function(){
                                                    if(auth()->user()->email_verified_at){
                                                            if(auth()->user()->payment_counter==0){
                                                                return redirect('/packages');
                                                            }
                                                            else{

                                                                    return view('customersupport');

                                                            }
                                                        }
                                                        else{
                                                            return redirect('/dashboard');
                                                        }

                                                                });






            Route::get('/dashboard/upgradePackage',function(){
                if(auth()->user()->email_verified_at){
                    if(auth()->user()->payment_counter==0){
                        return redirect('/packages');
                    }
                    else{
                        // if(auth()->user()->profile_check_1 && auth()->user()->profile_check_2 && auth()->user()->profile_check_3 && auth()->user()->status=="Approved")
                        // {
                            return view('upgradePackage');
                        // }
                        // else{
                        //     return redirect('/dashboard');
                        // }
                    }
                }
                else{
                    return redirect('/dashboard');
                }
                        //return view('requestdelivery');
                        });

                Route::get('/dashboard/addStaff',function(){
                            if(auth()->user()->role=='business')
                            {
                              if(auth()->user()->payment_counter==0){
                                return redirect('/packages');
                              }
                              else{
                                if(auth()->user()->email_verified_at){
                                    return view('addStaff');
                                }
                                else{
                                    return redirect('/dashboard');
                                }
                              }

                            }
                            else{
                                return redirect('/dashboard');
                            }
                        });


                Route::get('/dashboard/Items',function(){
                    return view('keysAdmin');
                })->middleware('admin');


                //->middleware('admin');

                Route::get('/dashboard/changePassword',function(){
                        return view('changePassword');
                })->middleware('admin');
                Route::get('/dashboard/request',function(){
                    return view('pendingRequest');
                })->middleware('admin');

                Route::get('/dashboard/history',function(){
                    return view('requestHistory');
                })->middleware('admin');
                Route::get('/dashboard/convohistory',function(){
                    return view('adminMessageHistory');
                })->middleware('admin');
                Route::get('/dashboard/scanreq',function(){
                    return view('scanRequestAdmin');
                })->middleware('admin');
                Route::get('/dashboard/scanhistory',function(){
                    return view('scanRequestHistory');
                })->middleware('admin');
                Route::get('/dashboard/contactformadmin',function(){
                    return view('contactformadmin');
                })->middleware('admin');
                Route::get('/dashboard/addadmin',function(){
                    return view('addAdmin');
                })->middleware('admin');
                Route::get('/dashboard/supportadmin',function(){
                    return view('customersupportadmin');
                })->middleware('admin');

});

Route::get('/plans', 'planController@index')->name('plans.index');

Route::get('/', function () {
    return view('main-testing');
})->name('main');




Route::get('/logout', function () {
    auth()->logout();
    return view('main-testing');
});





Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/pun', function(){
    return view('pininput');
// return redirect('/');
 })->middleware('admin');



Route::get('/packages',function(){
    if(auth()->user()){
        if(auth()->user()->payment_counter==0){
            return view('testingvue');
        }
        else{
    return redirect('/dashboard');}}
    else{
        return view('testingvue');
    }
    });

Route::get('/contactnumber',function(){
    if(auth()->user()){
        if(auth()->user()->phone){
            if(auth()->user()->payment_counter==0){
                return redirect('/payment');
            }
            else{
                return redirect('/dashboard');
            }
        }
        else{

            return view('contactNumber');
        }
                    }
    else{
        return redirect('/');
    }
    });



//Route::get('/send/email', 'HomeController@mail');

Auth::routes();

// Route::get('/send/emailorder', 'HomeController@mailOrder');
// Route::get('/send/emailorderdel', 'HomeController@mailOrderdel');
//});

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});


Route::get('/uploadtester', function() {
    //Artisan::call('cache:clear');
    return view('pdfUploader');
});

Route::get('/reset', function() {
    //Artisan::call('cache:clear');
    return view('passReset');
});
Route::get('/verification', function() {
    //Artisan::call('cache:clear');
    return view('emailVerify');
});
Route::get('/resetPass', function() {
    //Artisan::call('cache:clear');
    return view('passResetEmail');
});

Route::get('/termsAgreement', function() {

    return view('termsAgreement');
});

Route::get('/label', function() {

    return view('shippingLabel2');
});

Route::get('/contactform', function() {

    return view('contactForm');
});
Route::get('/testingaddress', function() {

    return view('testingaddress');
});



Route::get('/pickLabel', 'pickupController@viewPickupPdf');
//Route::get('file','DocumentfileController@create');

// Route::get('/slider',function() {

//     return view('slider');
// });
