@extends('main-layout')

@section('content')
<script src="https://js.stripe.com/v3/"></script>




<section class="section section-shaped section-lg" style="padding-top:6rem;padding-bottom:3rem">
        <div class="shape shape-style-1 shape-default"  style="margin-top:80px;height:80vh">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
        </div>




  <!--------OVERLAY AREA--------->



<div id="popup1" class="overlay" style="z-index:100">

        <div class="card bg-secondary shadow border-0" style="width: 50%;margin: auto;margin-top: 10vh;padding:40px" >

                <h3>Invoice</h3>
                <!--DOCUMENT-->
                <table style="width:100%">
                    <div style="border: 1px solid grey">
                        <tr class="doc_part">
                            <td>
                                <p> <b>Document Qty:</b> <span class="doc_qty"></span> documents</p>
                            </td>
                            <td>
                                <p> <b>Amount Paid:</b> <span class="doc_amount"></span>$</p>
                            </td>
                        </tr>
                    </div>
                <!---KEY--->
                    <div style="border: 1px solid grey">
                        <tr class="key_part">
                            <td>
                                <p> <b>Key Qty:</b> <span class="key_qty"></span> keys</p>
                            </td>
                            <td>
                                <p> <b>Amount Paid:</b> <span class="key_amount"></span>$</p>
                            </td>
                        </tr>
                    </div>
                </table>

                <div style="border: 1px solid grey">
                </div>
<br>
                <table style="width:100%">

                        <tr>
                            <td style="width:50%">

                            </td>
                            <td>
                                <p> <b>GST:</b> <span class="gst_amount"></span>$</p>
                                <p> <b>Total Amount Paid:</b> <span class="total_amount"></span>$</p>
                            </td>
                        </tr>


                </table>


                <table style="width:100%">

                    <tr style="width:100%">

                        <td style="width:100%">
                            <center><button type="button" class='continueBut btn btn-primary'> Continue </button></center>
                        </td>
                    </tr>


            </table>





        </div>



</div>







<!--------OVERLAY ENDS HERE------->

        <div class="container pt-lg-md">






          <div class="row justify-content-center">

                <div class="col-lg-5">
                        <div class="card bg-secondary shadow border-0" >
{{-- //////////////////////////////////////////////////////////////////////////////////////////////////////// --}}
                                <?php?>
                                 {{-- $intent = # ... Fetch or create the PaymentIntent; --}}

<form action="/charge" method="post" id="payment-form">
  <div class="form-row">
    <label for="card-element" style="margin:auto;margin-bottom:1em;margin-top:1em">
    <b> Credit or debit card </b>
    </label>
    <div id="card-element" style="margin:auto">
      <!-- A Stripe Element will be inserted here. -->
    </div>

    <!-- Used to display form errors. -->
    <div id="card-errors" role="alert" style="margin:auto"></div>
  </div>
<center><br>
  <button id="card-button" class="btn btn-primary" style="color:black;border-color:#FCD206;background-color:#FCD206;display:;margin:auto"><span class="spinner-border spinner-border-sm"  role="status" aria-hidden="true" style="display:none"></span> Confirm</button><br>
  {{-- <button  class="btn btn-primary" type="button" >
    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" ></span>
    Confirm
  </button> --}}

 {{-- /////////////////////////////////////////////////////////////////////////////////////////////////////////// --}}
  <br><center>
</form>

                        </div>
                        </div>
          </div>
        </div>
</section>

<br><br><br><br><br><br>

{{-- {{auth()->user()->name}} --}}




<script>

    var keys_id;
    var keys_quantity;
    var docs_id;
    var docs_quantity;
    var docData={};
    var keyData={};
    var test={};
    var pack={};
    var role;
    var doc_invoice;
    var key_invoice;
    var price_doc;
    var price_key;
    var mailData={};
    var totalcostsaved;
    var payment={};
  jQuery(document).ready(function () {
    $('.popup1').css('opacity', '0');

    $(".continueBut").click(function(){


        window.location.href = '/dashboard';



    });


    var get_key;

    $("#card-button").attr("disabled", true);

    $.ajax({
                     url: '/api/getkey',
                     type: 'GET',
                     success: function (result) {
                                //console.log(result);
                                get_key=result;
                                //console.log(get_key);

                                $.ajax({
                                    url: '/api/getsession',
                                    type: 'GET',
                                    success: function (response) {
                                            console.log(response);
                                            keys_id=response[0]
                                            keys_quantity=response[1]
                                            docs_id=response[2]
                                            docs_quantity=response[3]
                                            role=response[4]
                                            if(response[0]==null && response[1]==null && response[2]==null && response[3]==null)
                                            {
                                                window.location.href = '/packages';
                                            }
                                            else{
                                            restProcess(get_key);



                                                }
                                        },



                                     error: function (request, status, error) {

                                             console.log(error)

                                                                }
                                });



                     },
                     error: function (request, status, error) {

                                console.log(error)

                                }
            });


    });

function restProcess(get_key)
{

            //console.log(get_key)
            var stripe = Stripe(get_key);
            // Create an instance of Elements.
            var elements = stripe.elements();

            // Custom styling can be passed to options when creating an Element.
            // (Note that this demo uses a wider set of styles than the guide below.)
            var style = {
                        base: {
                            color: '#32325d',
                            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                            fontSmoothing: 'antialiased',
                            fontSize: '16px',
                            '::placeholder': {
                            color: '#aab7c4'
                            }
                        },


                        invalid: {
                            color: '#fa755a',
                            iconColor: '#fa755a'
                        }
            };

            // Create an instance of the card Element.
            var card = elements.create('card', {hidePostalCode: true, style: style});

            // Add an instance of the card Element into the `card-element` <div>.
            card.mount('#card-element');

            // Handle real-time validation errors from the card Element.
            card.addEventListener('change', function(event) {


                        var displayError = document.getElementById('card-errors');
                        if (event.error) {
                           // console.log('error');
                            displayError.textContent = event.error.message;
                            $(".spinner-border").css("display", "none");
                            $("#card-button").attr("disabled", true);
                        } else {
                            displayError.textContent = '';
                            //$(".spinner-border").css("display", "none");
                            $("#card-button").attr("disabled", false);

                        }
                            //$("#card-button").attr("disabled", false);

            });

            // Handle form submission.
            var form = document.getElementById('payment-form');
            form.addEventListener('submit', function(event) {/////////////////
                            event.preventDefault();
                            $(".spinner-border").css("display", "inline-block");
                            $("#card-button").attr("disabled", true);
                            stripe.createToken(card).then(function(result) {////////////
                                                if (result.error) {
                                                // Inform the user if there was an error.
                                                var errorElement = document.getElementById('card-errors');
                                                errorElement.textContent = result.error.message;
                                                }
                                                else {


                                                console.log(result.token.id);
                                                var cus_id;
                                                cus_id= "<?php echo auth()->user()->stripe_id ; ?>"
                                                //test['role']=role;
                                                var cus_id_db="<?php echo auth()->user()->id ; ?>";
                                                // $.ajax({
                                                //     url: '/api/addrole/'+cus_id_db,
                                                //     type: 'POST',
                                                //     data: test,
                                                // success: function (response) {


                                                // },
                                                // error: function (request, status, error)
                                                // {
                                                //             console.log(error)
                                                // }
                                                // });

                                                    console.log(keyData)
                                                keyData['id']=cus_id;
                                                keyData['plan']=keys_id;
                                                keyData['quantity']=keys_quantity;
                                                docData['id']=cus_id;
                                                docData['plan']=docs_id;
                                                docData['quantity']=docs_quantity;

                                                console.log(keyData)
                                                console.log(docData)


                                                pack['key_id']=keys_id;
                                                pack['key_quantity']=keys_quantity;
                                                pack['doc_id']=docs_id;
                                                pack['doc_quantity']=docs_quantity;
                                                console.log(pack)

                                                // pack['key_id']="plan_G8Sv5DPawPDeMd"
                                                // pack['key_quantity']=4
                                                // pack['doc_id']="plan_G8SuAGdJ5ZIkM6"
                                                // pack['doc_quantity']=3
                                                // this.docs_id=1;
                                                // this.keys_id=1;

                                                // keyData['id']="cus_GVKI5xvuyA8o0N"
                                                // keyData['plan']="plan_G8Sv5DPawPDeMd"
                                                // keyData['quantity']=4
                                                // docData['id']="cus_GVKI5xvuyA8o0N"
                                                // docData['plan']="plan_G8SuAGdJ5ZIkM6"
                                                // docData['quantity']=3

                                                //console.log(cus_id);
                                                $tok['token'] = result.token.id;
                                                $.ajax({
                                                                    url: '/api/add-payment-method',
                                                                    type: 'POST',
                                                                    dataType: 'json',
                                                                    data: tok,
                                                                    success: function (data) {
                                                                        console.log(data);




                                                                                    var mail={};
                                                                                    mail['id']=cus_id;
                                                                                    $.ajax({
                                                                                        url:'/api/send/email',
                                                                                        type: 'POST',
                                                                                        data: mail,
                                                                                        success: function(){

                                                                                        }
                                                                                    })





                                                                                    if(docs_id)///////////////////
                                                                                    {   console.log(docData)

                                                                                        $.ajax({
                                                                                            url: '/api/subscription',
                                                                                            type: 'POST',
                                                                                            //contentType: "application/json",
                                                                                            //dataType: "json",
                                                                                            data: docData,
                                                                                            success: function (data) {
                                                                                               console.log("doc subscribed");
                                                                                              pack['sub1']=data.id;
                                                                                              doc_invoice=data.latest_invoice;

                                                                                                if(keys_id){
                                                                                                    //console.log("key sub on");
                                                                                                    $.ajax({
                                                                                                    url: '/api/subscription',
                                                                                                    type: 'POST',
                                                                                                    //contentType: "application/json",
                                                                                                    //dataType: 'json',
                                                                                                    data: keyData,
                                                                                                    success: function (data) {
                                                                                                        console.log("key subscribed");
                                                                                                        pack['sub2']=data.id;
                                                                                                        key_invoice=data.latest_invoice;
                                                                                                        //API to be called here
                                                                                                        $.ajax({
                                                                                                                url: '/api/customerpackage/'+cus_id,
                                                                                                                type: 'POST',
                                                                                                                //contentType: "application/json",
                                                                                                                //dataType: "string",
                                                                                                                data: pack,
                                                                                                                success: function () {
                                                                                                                        console.log('user updated 1');
                                                                                                                        console.log(doc_invoice);
                                                                                                                        console.log(key_invoice);

                                                                                                                        //----------------------------------------------------------------------------
                                                                                                                        $.ajax({
                                                                                                                            url: '/api/getInvoice/'+doc_invoice,
                                                                                                                            type: 'GET',
                                                                                                                            //data: JSON.stringify(keyData),
                                                                                                                        success: function (data) {
                                                                                                                                console.log(data);
                                                                                                                                mailData['invoice_doc']=doc_invoice;
                                                                                                                                $(".doc_amount").text(((data.amount_paid/100)*0.9).toFixed(2));
                                                                                                                                mailData['doc_cost']=data.amount_paid/100;
                                                                                                                                price_doc=data.amount_paid/100;
                                                                                                                                $(".doc_qty").text(pack['doc_quantity']);
                                                                                                                                mailData['doc_qty']=pack['doc_quantity'];

                                                                                                                                $.ajax({
                                                                                                                                        url: '/api/getInvoice/'+key_invoice,
                                                                                                                                        type: 'GET',
                                                                                                                                        //data: JSON.stringify(keyData),
                                                                                                                                    success: function (data) {
                                                                                                                                            console.log(data);
                                                                                                                                            mailData['invoice_key']=key_invoice;
                                                                                                                                            mailData['key_cost']=data.amount_paid/100;
                                                                                                                                            mailData['key_qty']=pack['key_quantity'];
                                                                                                                                            mailData['email']='<?php echo auth()->user()->email; ?>';
                                                                                                                                            mailData['name']='<?php echo auth()->user()->name; ?>';
                                                                                                                                            mailData['stripe_id']='<?php echo auth()->user()->stripe_id; ?>';
                                                                                                                                            mailData['id']='<?php echo auth()->user()->id; ?>';
                                                                                                                                            mailData['cost']=(data.amount_paid/100)+price_doc;
                                                                                                                                            emailInvoice(mailData);
                                                                                                                                            //$(".overlay").css("display", "block");
                                                                                                                                            var displaykeyamount=(data.amount_paid/100)*0.9;
                                                                                                                                            var displaykeyqty=pack['key_quantity'];
                                                                                                                                            var displaytotalamount=(data.amount_paid/100)+price_doc;
                                                                                                                                            var displaygstamount=((data.amount_paid/100)+price_doc)*0.1;

                                                                                                                                            // $(".key_amount").text((data.amount_paid/100)*0.9);
                                                                                                                                            // $(".key_qty").text(pack['key_quantity']);
                                                                                                                                            // $(".total_amount").text((data.amount_paid/100)+price_doc);
                                                                                                                                            // $(".gst_amount").text(((data.amount_paid/100)+price_doc)*0.1);


                                                                                                                                            $(".key_amount").text(displaykeyamount.toFixed(2));
                                                                                                                                            $(".key_qty").text(pack['key_quantity']);
                                                                                                                                            $(".total_amount").text(displaytotalamount.toFixed(2));
                                                                                                                                            $(".gst_amount").text(displaygstamount.toFixed(2));

                                                                                                                                            this.totalcostsaved=mailData['cost'];
                                                                                                                                            console.log(this.totalcostsaved);
                                                                                                                                           // console.log(this.mailData['cost']);
                                                                                                                                            payment['amount']=String(this.totalcostsaved);
                                                                                                                                            payment['description']='Subscription Payment';
                                                                                                                                            payment['user_id']="<?php echo auth()->user()->id ; ?>";
                                                                                                                                            $.ajax({
                                                                                                                                                                                                        url: '/api/createpayment',
                                                                                                                                                                                                        type: 'POST',
                                                                                                                                                                                                        //dataType: 'json',
                                                                                                                                                                                                        data: payment,
                                                                                                                                                                                                        success: function (data) {
                                                                                                                                                                                                            console.log(data);
                                                                                                                                                                                                            //window.location.href = '/dashboard';
                                                                                                                                                                                                            }

                                                                                                                                                                                                                        });
                                                                                                                                            //$('.popup1').css('opacity', '1');




                                                                                                                                    },
                                                                                                                                    error: function (request, status, error) {

                                                                                                                                    }

                                                                                                                                });
                                                                                                                        },
                                                                                                                        error: function (request, status, error) {

                                                                                                                        }

                                                                                                                    });

                                                                                                                    //-------------------------------------------------------------------------------
                                                                                                                        //window.location.href = '/dashboard';

                                                                                                                },
                                                                                                                 error: function (request, status, error) {
                                                                                                                    // alert(request.responseText);
                                                                                                                    $(".spinner-border").css("display", "none");
                                                                                                                    $("#card-button").attr("disabled", false);
                                                                                                                        console.log(error)

                                                                                                                    }
                                                                                                            });



                                                                                                    },
                                                                                                    error: function (request, status, error) {
                                                                                                                    // alert(request.responseText);
                                                                                                                        console.log(error);
                                                                                                                        $(".spinner-border").css("display", "none");
                                                                                                                        $("#card-button").attr("disabled", false);

                                                                                                                    }
                                                                                                    });


                                                                                                }

                                                                                                else{console.log("it went to shit");

                                                                                                $.ajax({
                                                                                                                url: '/api/customerpackage/'+cus_id,
                                                                                                                type: 'POST',
                                                                                                                // contentType: "application/json",
                                                                                                                // dataType: "json",
                                                                                                                data: pack,
                                                                                                                success: function () {
                                                                                                                        console.log('user updated 2');



                                                                                                                        //Invoice for just Doc
                                                                                                                        $.ajax({
                                                                                                                            url: '/api/getInvoice/'+doc_invoice,
                                                                                                                            type: 'GET',
                                                                                                                            //data: JSON.stringify(keyData),
                                                                                                                        success: function (data) {
                                                                                                                                console.log(data);
                                                                                                                                mailData['email']='<?php echo auth()->user()->email; ?>';
                                                                                                                                mailData['name']='<?php echo auth()->user()->name; ?>';
                                                                                                                                mailData['stripe_id']='<?php echo auth()->user()->stripe_id; ?>';
                                                                                                                                mailData['id']='<?php echo auth()->user()->id; ?>';
                                                                                                                                mailData['invoice_doc']=doc_invoice;
                                                                                                                                mailData['doc_cost']=data.amount_paid/100;
                                                                                                                                mailData['doc_qty']=pack['doc_quantity'];
                                                                                                                                mailData['cost']=data.amount_paid/100;
                                                                                                                                mailData['invoice_key']=null;
                                                                                                                                mailData['key_cost']=null;
                                                                                                                                mailData['key_qty']=null;
                                                                                                                                emailInvoice(mailData);
                                                                                                                                this.totalcostsaved=mailData['cost'];

                                                                                                                                $(".key_part").css("display", "none");
                                                                                                                                //$(".overlay").css("display", "block");

                                                                                                                                $(".doc_amount").text(((data.amount_paid/100)*0.9).toFixed(2));
                                                                                                                                //price_doc=data.amount_paid;
                                                                                                                                $(".doc_qty").text(pack['doc_quantity']);
                                                                                                                                //$('.popup1').css('opacity', '1');
                                                                                                                                $(".total_amount").text((data.amount_paid/100).toFixed(2));
                                                                                                                                $(".gst_amount").text(((data.amount_paid/100)*0.1).toFixed(2));

                                                                                                                                // <!--$.ajax({
                                                                                                                                //         url: '/api/getInvoice/'+key_invoice,
                                                                                                                                //         type: 'GET',
                                                                                                                                //         //data: JSON.stringify(keyData),
                                                                                                                                //     success: function (data) {
                                                                                                                                //             console.log(data);
                                                                                                                                //             $(".key_amount").text(data.amount_paid);
                                                                                                                                //             $(".key_qty").text(pack['key_quantity']);
                                                                                                                                //             $(".total_amount").text(data.amount_paid+price_doc);





                                                                                                                                //     },
                                                                                                                                //     error: function (request, status, error) {

                                                                                                                                //     }

                                                                                                                                // });-->




                                                                                                                                payment['amount']=String(this.totalcostsaved);
                                                                                                                                payment['description']='Subscription Payment';
                                                                                                                                payment['user_id']="<?php echo auth()->user()->id ; ?>";
                                                                                                                                $.ajax({
                                                                                                                                                                                            url: '/api/createpayment',
                                                                                                                                                                                            type: 'POST',
                                                                                                                                                                                            //dataType: 'json',
                                                                                                                                                                                            data: payment,
                                                                                                                                                                                            success: function (data) {
                                                                                                                                                                                                console.log(data);
                                                                                                                                                                                               // window.location.href = '/dashboard';
                                                                                                                                                                                                }

                                                                                                                                                                                                            });


                                                                                                                        },
                                                                                                                        error: function (request, status, error) {

                                                                                                                        }

                                                                                                                    });
                                                                                                                        //INVOICE API GOES HERE





                                                                                                                        //window.location.href = '/dashboard';

                                                                                                                },
                                                                                                                 error: function (request, status, error) {
                                                                                                                    // alert(request.responseText);
                                                                                                                        console.log(error);
                                                                                                                        $(".spinner-border").css("display", "none");
                                                                                                                        $("#card-button").attr("disabled", false);

                                                                                                                    }
                                                                                                            });


                                                                                                }


                                                                                                },
                                                                                                error: function (request, status, error) {
                                                                                                                    // alert(request.responseText);
                                                                                                                        console.log(error);
                                                                                                                        $(".spinner-border").css("display", "none");
                                                                                                                        $("#card-button").attr("disabled", false);

                                                                                                                    }

                                                                                            });
                                                                                    }///doc if end

                                                                                    else{/////////////////////////


                                                                                        if(keys_id)
                                                                                        {
                                                                                            $.ajax({
                                                                                                    url: '/api/subscription',
                                                                                                    type: 'POST',
                                                                                                    //contentType: "application/json",
                                                                                                    //dataType: 'json',
                                                                                                    data: keyData,
                                                                                                    success: function (data) {
                                                                                                       console.log("key subscribed");
                                                                                                       pack['sub2']=data.id;
                                                                                                        key_invoice=data.latest_invoice;
                                                                                                       $.ajax({
                                                                                                                url: '/api/customerpackage/'+cus_id,
                                                                                                                type: 'POST',
                                                                                                                // contentType: "application/json",
                                                                                                                // dataType: "json",
                                                                                                                data: pack,
                                                                                                                success: function () {
                                                                                                                            console.log('user updated 3');


                                                                                                                            //INVOICE API GOES HERE
                                                                                                                            //Invoice for just Key
                                                                                                                        $.ajax({
                                                                                                                            url: '/api/getInvoice/'+key_invoice,
                                                                                                                            type: 'GET',
                                                                                                                            //data: JSON.stringify(keyData),
                                                                                                                        success: function (data) {
                                                                                                                                console.log(data);
                                                                                                                                mailData['email']='<?php echo auth()->user()->email; ?>';
                                                                                                                                mailData['name']='<?php echo auth()->user()->name; ?>';
                                                                                                                                mailData['stripe_id']='<?php echo auth()->user()->stripe_id; ?>';
                                                                                                                                mailData['id']='<?php echo auth()->user()->id; ?>';
                                                                                                                                mailData['invoice_doc']=null;
                                                                                                                                mailData['doc_cost']=null;
                                                                                                                                mailData['doc_qty']=null;
                                                                                                                                mailData['cost']=data.amount_paid/100;
                                                                                                                                mailData['invoice_key']=key_invoice;
                                                                                                                                mailData['key_cost']=data.amount_paid/100;
                                                                                                                                mailData['key_qty']=pack['key_quantity'];
                                                                                                                                emailInvoice(mailData);
                                                                                                                                this.totalcostsaved=mailData['cost'];
                                                                                                                                //$(".doc_amount").text(data.amount_paid);
                                                                                                                                //price_doc=data.amount_paid;
                                                                                                                                //$(".doc_qty").text(pack['doc_quantity']);
                                                                                                                                             $(".doc_part").css("display", "none");

                                                                                                                                            //$(".overlay").css("display", "block");
                                                                                                                                            $(".key_amount").text(((data.amount_paid/100)*0.9).toFixed(2));
                                                                                                                                            $(".key_qty").text(pack['key_quantity']);
                                                                                                                                            $(".total_amount").text((data.amount_paid/100).toFixed(2));
                                                                                                                                            $(".gst_amount").text(((data.amount_paid/100)*0.1).toFixed(2));
                                                                                                                                            //$('.popup1').css('opacity', '1');
                                                                                                                                            payment['amount']=String(this.totalcostsaved);
                                                                                                                                            payment['description']='Subscription Payment';
                                                                                                                                            payment['user_id']="<?php echo auth()->user()->id ; ?>";
                                                                                                                                            $.ajax({
                                                                                                                                                                                                        url: '/api/createpayment',
                                                                                                                                                                                                        type: 'POST',
                                                                                                                                                                                                        //dataType: 'json',
                                                                                                                                                                                                        data: payment,
                                                                                                                                                                                                        success: function (data) {
                                                                                                                                                                                                            console.log(data);
                                                                                                                                                                                                            //window.location.href = '/dashboard';
                                                                                                                                                                                                            }

                                                                                                                                                                                                                        });
                                                                                                                                    },

                                                                                                                        error: function (request, status, error) {

                                                                                                                        }

                                                                                                                    });



                                                                                                                            //window.location.href = '/dashboard';

                                                                                                                },
                                                                                                                 error: function (request, status, error) {
                                                                                                                    // alert(request.responseText);
                                                                                                                            console.log(error)
                                                                                                                    }
                                                                                                            });


                                                                                                    }
                                                                                                    });

                                                                                        }
                                                                                        else
                                                                                        {
                                                                                            //nothing worked....shouldn't work
                                                                                            console.log("shit");
                                                                                        }
                                                                                    }//doc else end





                                                },///success card customer ajax
                                                error: function (request, status, error) {
                                                                                                                    // alert(request.responseText);
                                                                                                                        console.log(error);
                                                                                                                        $(".spinner-border").css("display", "none");
                                                                                                                        $("#card-button").attr("disabled", false);

                                                                                                                    }
                                            });///card customer ajax





                                                                 }//end



                                                    });
            });


            // Submit the form with the token ID.
            function stripeTokenHandler(token) {
            // Insert the token ID into the form so it gets submitted to the server
            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            console.log(hiddenInput)
            form.appendChild(hiddenInput);

            }
}

function emailInvoice(mailData){
    $.ajax({
         url: '/api/send/mailInvoice',
         type: 'POST',
         data: mailData,
         success: function (data) {
            $(".overlay").css("display", "block");
            setTimeout(() => $('.popup1').css('opacity', '1'), 2000);


         },
         error: function (request, status, error) {
                                    console.log(error)
         }
        });
}


</script>
@endsection
