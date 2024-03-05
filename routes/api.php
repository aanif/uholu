<?php

use App\Http\Controllers\keyController;
use App\Http\Controllers\subscriptionController;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::group(['middleware' => 'auth'], function (){
//------------------------------------Plan API Stripe------------------------------------------------
    //////////Just to update user end of the plans///////////////
    Route::get('/plans', 'planController@index');//No need
    //////////Plan Control for the administrator/////////////////
    Route::post('/plan','planController@create');//No need
    Route::get('/plan/{id}','planController@retrieve');//No need
    Route::post('/plan/{id}','planController@update');//No need
    Route::delete('/plan/{id}','planController@delete');//No need
    Route::get('/plan','planController@show');//No need
    Route::post('/currPackage','planController@currPackage');//No need
//-----------------------------------Customer API DB---------------------------------------------
Route::group(['middleware' => ['jwt.verify']], function() {
    Route::post('/customer-profile','customerController@updateprofile');//done***#
    Route::post('/customer-image-upload','customerController@updateimg');//done***#
    Route::post('/customer-profile-picture','customerController@updatePro');//done***#
    Route::post('/update-customer-address','customerController@updateaddress');//done***#
    Route::post('/customerpackage/{id}','customerController@updatepackage');//No need
    Route::post('/resubpackage/{id}','customerController@resubpackage');//No need
    Route::post('/update-newpassword','customerController@updatePassword');//Done***#

});


Route::group(['middleware' => ['jwt.admin.verify']], function() {

    Route::get('/customergetall','customerController@getUsers');//No need Admin
    Route::get('/getcount','customerController@userCounter');//No need Admin
    Route::get('/getpendingcount','customerController@pendinguserCounter');//No need Admin
    Route::post('/updateAdminPro/{id}','customerController@updateAdminPro');//No need Admin
    Route::post('/updateAdminBus/{id}','customerController@updateAdminBus');//No need Admin
});


Route::group(['middleware' => ['jwt.verify']], function() {

    Route::post('/addrole/{id}','customerController@addrole');//No need
    Route::post('/business-profile','customerController@businesspro');//Done***#
    Route::post('/quantityUpdate','customerController@quantityUpdate');//No need
    Route::get('/update-message-counter','customerController@updateMessageCounter');//done***#
    Route::post('/addcontactnumber/{id}','customerController@addcontactnumber');//No need
    Route::post('/uniqueNumber','customerController@uniqueNumber');//No need
    Route::post('/passwordUpdate','customerController@passwordUpdate');//No need
});



    Route::post('/verifyEmail','customerController@verifyEmail');//No need
    Route::post('/uniqueEmailId','customerController@uniqueEmailId');//No need
    Route::post('/loginPassword','customerController@loginPassword');//No need
    Route::post('/loginEmail','customerController@loginEmail');//No need

Route::group(['middleware' => ['jwt.admin.verify']], function() {

    Route::delete('/delete-user/{id}','customerController@deleteUser');//No need Admin
    Route::post('/updateActiveRequestCount/{id}','customerController@updateActiveRequestCount');//No need Admin
    Route::post('/updateActiveScanCount/{id}','customerController@updateActiveScanCount');//No need Admin
    Route::post('/updateContactFormCount/{id}','customerController@updateContactFormCount');//No need Admin
    Route::post('/verifyadminpassword/{id}','customerController@verifyAdmin');//No need Admin
    Route::post('/deleteImgFile/{id}','customerController@deleteImageFile');//No need Admin
});

//-----------------------------------Customer API stripe---------------------------------------------
    Route::post('/customer','customerController@create');//No need
    Route::get('/customer/{id}','customerController@retrieve');//No need
    Route::delete('/customer/{id}','customerController@delete');//No need
    Route::get('/customer','customerController@index');//No need

Route::group(['middleware' => ['jwt.verify']], function() {

    Route::post('/add-payment-method','customerController@update');//Done***#


});


    //Route::post('/customerdefault/{id}','customerController@defaultPayment')->name('customer.default');
//-----------------------------------Subscription API stripe------------------------------------------
Route::group(['middleware' => ['jwt.verify']], function() {

    Route::get('/subscription','subscriptionController@index');//No need
    Route::post('/subscription','subscriptionController@create'); //No need
    Route::get('/subscription/{id}','subscriptionController@retrieve');//No need
    Route::post('/subscription/{id}','subscriptionController@update');//No need
    Route::post('/subscription1/{id}','subscriptionController@update1');//No need
    Route::delete('/subscription/{id}','subscriptionController@cancel');//No need
    Route::post('/retrieveInvoice/{id}','subscriptionController@retrieveInvoice');//No need
    Route::get('/getInvoice/{id}','subscriptionController@getInvoice');//No need
});

//----------------------------------Payment Method API stripe-----------------------------------------
    Route::post('/paymentmethod','paymentController@create');//No need
    Route::get('/paymentmethod/{id}','paymentController@retrieve');//No need
    Route::post('/paymentmethod/{id}','paymentController@update');//No need
    Route::get('/paymentmethod','paymentController@index');//No need
    Route::post('/paymentmethod/{id}/attach','paymentController@attachpayment');//No need
    Route::post('/paymentmethod/{id}/detach','paymentController@detachpayment');// No need

    Route::get('customer/{id}/sources?object=card','cardController@index');// No need
    Route::post('customer/{id}/sources','cardController@create');// No need
    Route::get('customer/{id}/sources/{idc}','cardController@retrieve');// No need
    Route::post('customer/{id}/sources/{idc}','cardController@update');// No need
    Route::delete('customer/{id}/sources/{idc}','cardController@delete');// No need
//------------------------------------Payment one time API stripe-------------------------------------
    Route::post('/paymentintent','subscriptionController@paymentintent');// No need
//------------------------------------SMS code API----------------------------------------------------
Route::group(['middleware' => ['jwt.verify']], function() {

    Route::post('/send-code','codeController@store');//done***#
    Route::post('/verify-code','codeController@check');//done***#
});


//-----------------------------------Retrieving Plans from DB-----------------------------------------
    Route::get('/planView','planController@viewPlans');//No need

//----------------------------------Getting Stripe Key-------------------------------------------------
    Route::get('/getkey','stripeKeyController@view');//No need
//------------------------------Session variable -------------------------------------------------------
    Route::post('/storesession','sessionController@storePackage');// No need
    Route::get('/getsession','sessionController@getPackage');// No need
//------------------------------key CRUD API-----------------------------------------------------------
Route::group(['middleware' => ['jwt.verify']], function() {

    Route::get('/get-user-keys','keyController@viewKeys');//done***#
    Route::post('/add-key','keyController@create');//done***#
    Route::post('/update-key/{key_id}','keyController@update');//done***#
    Route::post('/delete-key/{key_id}','keyController@destroy');//done***#

});

Route::group(['middleware' => ['jwt.admin.verify']], function() {

    Route::post('/updateKeyadmin/{id}','keyController@updateAdminKey');//No need admin
    Route::get('/getAllKeys','keyController@getAllKeys');//No need admin
    Route::get('/getCountKeys','keyController@keyCounter');//No need admin
    Route::delete('/deleteItemk/{id}','keyController@deleteItem');//No need admin

});

    Route::get('/userKeyCounter/{id}','keyController@userKeyCounter');//No need
//------------------------------doc CRUD API-----------------------------------------------------------
Route::group(['middleware' => ['jwt.verify']], function() {

    Route::get('/get-user-docs','docController@viewDocs');//done***#
    Route::post('/add-document','docController@create');//done***#
    Route::post('/update-doc/{doc_id}','docController@update');//done***#
    Route::post('/delete-doc/{doc_id}','docController@destroy');//done***#
});

Route::group(['middleware' => ['jwt.admin.verify']], function() {

    Route::post('/updateDocadmin/{id}','docController@updateAdminDoc');//No need admin
    Route::get('/getAllDocs','docController@getAllDocs');//No need admin
    Route::get('/getCountDocs','docController@docCounter');//no need admin
    Route::delete('/deleteItemd/{id}','docController@deleteItem');//No need admin
});

    Route::get('/userDocCounter/{id}','docController@userDocCounter');//No need

//------------------------------Doc Pickup API----------------------------------------------------------
Route::group(['middleware' => ['jwt.verify']], function() {

    Route::get('/get-docs-for-pickup','docController@getpickup');//done***#
    Route::get('/get-docs-for-delivery','docController@getdelivery');//done***#

//------------------------------Key Pickup API----------------------------------------------------------

    Route::get('/get-keys-for-pickup','keyController@getpickup');//done***#
    Route::get('/get-keys-for-delivery','keyController@getdelivery');//done***#

});

//-------------------------------Pickup Data API--------------------------------------------
Route::group(['middleware' => ['jwt.verify']], function() {

    Route::post('/create-pickup','pickupController@create');//Done***#
    Route::get('/view-user-pickup-requests','pickupController@viewRequestsPickUser');//done***#
    Route::get('/view-user-Pickup-history','pickupController@viewUserPickHistory');//done***#

});

Route::group(['middleware' => ['jwt.admin.verify']], function() {

    Route::post('/updatePrequest/{id}','pickupController@updatePrequest');//No need admin
    Route::get('/viewRequestsPick','pickupController@viewRequestsPick');//No need admin
    Route::get('/viewRequestsPickHistory','pickupController@viewRequestsPickHistory');//No need admin
    Route::post('/updateHistoryRequestpick/{id}','pickupController@updateHistoryRequest');//No need admin
});


    Route::get('/pickupCounter','pickupController@pickupCounter');//no need


//-------------------------------Delivery Data API------------------------------------------
Route::group(['middleware' => ['jwt.verify']], function() {

    Route::post('/create-delivery','deliveryController@create');//Done***#
    Route::get('/view-user-delivery-requests','deliveryController@viewRequestsUser');//done***#
    Route::post('/user-update-items','deliveryController@userUpdateItems');//done***#
    Route::get('/view-user-delivery-history','deliveryController@viewUserDeliverHistory');//done***#

});

Route::group(['middleware' => ['jwt.admin.verify']], function() {

    Route::post('/updateKrequest/{id}','deliveryController@updateKrequest');//No need admin
    Route::get('/viewRequests','deliveryController@viewRequests');//No nned admin
    Route::get('/viewRequestsHistory','deliveryController@viewRequestsHistory');//No need admin
    Route::post('/updateHistoryRequestdel/{id}','deliveryController@updateHistoryRequest');//No need admin
});


    Route::get('/deliveryCounter','deliveryController@deliveryCounter');//No need
    Route::get('/getShippingLabel/{id}','deliveryController@getShippingLabel');//To be looked at
    Route::get('/getShippingLabelPro/{id}','deliveryController@action');//To be looked at

//-------------------------------Get progress for Progress Bar------------------------------

    Route::post('/progress','planController@getProgress')->name('progress.get');

//---------------------------------------email APIs------------------------------------------------
    Route::post('/send/email', 'HomeController@mail');//No need
    Route::post('/send/emailorder', 'HomeController@mailOrder');//No need
    Route::post('/send/emailorderdel', 'HomeController@mailOrderdel');//No need
    Route::post('/send/delivered', 'HomeController@delivered');//No need
Route::group(['middleware' => ['jwt.admin.verify']], function() {
    Route::post('/send/secured', 'HomeController@secured');//no need admin
});

    Route::post('/send/newpick', 'HomeController@pickorder');//No need
    Route::post('/send/newdel', 'HomeController@delorder');//No need
    Route::post('/send/mailInvoice','HomeController@invoice');//No need
    Route::post('/send/scanRequest', 'HomeController@scanRequest');//No need


//---------------------------------------Messaging APIs------------------------------------------------
Route::group(['middleware' => ['jwt.admin.verify']], function() {
    Route::get('/message','MessageController@view')->name('message.view');//No need admin
});


Route::group(['middleware' => ['jwt.verify']], function() {

    Route::get('/user-messages','MessageController@userView');//done***#
    Route::post('/message-mark-as-read/{id}','MessageController@markAsRead');//done***#
    Route::get('/check-new-messages','MessageController@messageNotification');//done***#
    Route::delete('/delete-message/{id}','MessageController@delete');//done***#

});


    Route::get('/messageUserCount/{id}','MessageController@userViewCount');//No need

Route::group(['middleware' => ['jwt.admin.verify']], function() {

    Route::post('/message','MessageController@create')->name('message.create');//No need admin
    });

//-----------------------------------------Staff APIs--------------------------------------------------
Route::group(['middleware' => ['jwt.verify']], function() {

Route::post('/getStaff','customerController@getStaff');//No need
Route::post('/emailCheck','customerController@emailCheck');//No need
Route::post('/addStaff/{id}','customerController@addStaff');//No need
Route::delete('/deleteStaff/{id}','customerController@deleteStaff');//No need
Route::post('/updateStaff/{id}','customerController@updateStaff');//No need
});


//-----------------------------------------Admin APIs--------------------------------------------------

Route::group(['middleware' => ['jwt.admin.verify']], function() {

Route::post('/getAdmin','customerController@getAdmin');//No need admin
Route::post('/emailCheck','customerController@emailCheck');//No need admin
Route::post('/addAdmin/{id}','customerController@addAdmin');//No need admin
Route::delete('/deleteAdmin/{id}','customerController@deleteAdmin');//No need admin
Route::post('/updateAdmin/{id}','customerController@updateAdmin');//No need admin
});


Route::post('/upload-file/{id}','DocumentfileController@uploadFile');//done***


//----------------------------------------scan APIs----------------------------------------------------

Route::group(['middleware' => ['jwt.verify']], function() {

Route::post('/scan','ScanController@create');//done***
});

Route::group(['middleware' => ['jwt.admin.verify']], function() {

Route::get('/scanactive','ScanController@getActive');//No need Admin
Route::get('/scanactiveCount','ScanController@scanActiveCount');//No need Admin
Route::get('/scaninactive','ScanController@getInactive');//No need admin
Route::post('/completedRequest/{id}','ScanController@completedRequest');//No need admin
});

//---------------------------------------password Reset API---------------------------------------------

Route::post('/createReset','PassresetController@create');//No need
Route::post('/checkEmail','PassresetController@emailExists');//No need
Route::post('/getemail','PassresetController@getemail');//No need

//---------------------------------------Email Verification API---------------------------------------------

Route::group(['middleware' => ['jwt.verify']], function() {

Route::post('/email-verification','EmailVerifyController@create');//done***#
});


Route::post('/getemailVerify','EmailVerifyController@getemailVerify');//No need
Route::post('/emailExistsVerify','EmailVerifyController@emailExistsVerify');//No need
//---------------------------------------Payement History API---------------------------------------------

Route::post('/createpayment','PaymentsController@create');//No need

Route::group(['middleware' => ['jwt.verify']], function() {

Route::get('/get-payments','PaymentsController@getUserPayments');//done***#
});

//------------------------------------------Contact Form API---------------------------------------------

Route::post('/contact-form-message-create','ContactformController@create');//done***#

Route::group(['middleware' => ['jwt.admin.verify']], function() {

Route::get('/contactformget','ContactformController@view');//No need Admin
Route::delete('/contactformdelete/{id}','ContactformController@deleteForm');//No need Admin
Route::post('/contactformread/{id}','ContactformController@upgrade');//No need Admin
Route::get('/contactformcount','ContactformController@counter');//No need Admin
});

//------------------------------------------Customer Support API---------------------------------------------

Route::group(['middleware' => ['jwt.verify']], function() {

Route::post('/customer-support-create','CustomerSupportController@create');//done***
});

Route::group(['middleware' => ['jwt.admin.verify']], function() {

Route::get('/viewSupport','CustomerSupportController@view');//No need admin
Route::get('/SupportRead/{id}','CustomerSupportController@markAsRead');//No need admin
Route::delete('/SupportDelete/{id}','CustomerSupportController@delete');//No need admin
Route::get('/supportCounter','CustomerSupportController@ViewCount');//No need admin
Route::post('/updateSupportCount/{id}','CustomerSupportController@updatesupport');//No need admin

});


Route::post('/pickLabel/{id}', 'pickupController@viewPickupPdf');//To be looked at
Route::get('/pickupLabelCustomer/{id}', 'pickupController@qrFunction');//To be looked at
//resend the commit




Route::post('/webhook/test','HomeController@test');

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('/auth/logout', 'AuthController@logout');
});
Route::post('/auth/login','AuthController@login');
Route::post('/auth/register','AuthController@register');

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('/get-address','customerController@getaddress');
    Route::get('/get-role','customerController@getrole');
});
