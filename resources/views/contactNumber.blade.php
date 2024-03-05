@extends('main-layout')

@section('content')
<script src="https://js.stripe.com/v3/"></script>




<section class="section section-shaped section-lg" style="padding-top:6rem;padding-bottom:3rem">
        <div class="shape shape-style-1 shape-default"  style="margin-top:80px;height:80vh">
      <!--<span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>-->
        </div>
        <div class="container pt-lg-md">






          <div class="row justify-content-center">

                <div class="col-lg-5"><br><br>
                        <div class="card bg-secondary shadow border-0" style="padding-top:30px;padding-left:20px;">
{{-- //////////////////////////////////////////////////////////////////////////////////////////////////////// --}}
                                <?php?>
                                 {{-- $intent = # ... Fetch or create the PaymentIntent; --}}

{{-- <form method="post" id="payment-form"> --}}
  <div class="form-row">
    <label for="card-element" style="margin:auto;margin-bottom:1em;margin-top:1em">
    <b> Enter Phone Number </b>
    </label><br>

    <div id="card-element" style="margin:auto">
        <div class="form-group">
            <center>
            <div class="input-group input-group-alternative">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-phone"> &nbsp<p style="display:inline-block;margin-bottom:0rem"> +61</p></i></span>
            </div>
            <input class="teli form-control"  value="{{ old('phone') }}" placeholder="Phone Number" type="tel" name="phone" id="phone" >
            <center> <span class="help-block" style="align:auto">

            </span></center>
        </div>
        <p id="verifyConfirm" style="font-size: 11px;color:#191D4D"><b>Minimum 8 charecter long telephone for the beta version</b></p>
                        <p id="verifyConfirm3" style="font-size: 12px;"></p>

    </center>
    </div>
      <!-- A Stripe Element will be inserted here. -->
    </div>




    <div style="display:" class="form-group">
        <div id="popup1" class="overlay" style="display: none">
                <div class="popupi" >
                    {{-- <h2>Phone Number Verification</h2> --}}
                    <button class="close" id="close">&times;</button>
                    <div class="content">
                        {{-- Enter the verification code.
                        <input class="form-control" placeholder="verification code" type="text" name="code" id="code"> --}}


                        <center><span>
                            <h3>Enter verification code</h3>
                          <input  onkeypress="return /\d/.test(String.fromCharCode(((event||window.event).which||(event||window.event).which)));" type="text" name="myinput" id="myinput0" maxlength="1" size="2" style="font-size:15px;height:40px;text-align:center;border: 0.1px solid #C8C8C8;"/>
                          <input  onkeypress="return /\d/.test(String.fromCharCode(((event||window.event).which||(event||window.event).which)));" type="text" name="myinput" id="myinput1" maxlength="1" size="2" style="font-size:15px;height:40px;text-align:center;border: 0.1px solid #C8C8C8;"/>
                          <input  onkeypress="return /\d/.test(String.fromCharCode(((event||window.event).which||(event||window.event).which)));" type="text" name="myinput" id="myinput2" maxlength="1" size="2" style="font-size:15px;height:40px;text-align:center;border: 0.1px solid #C8C8C8;"/>
                          <input  onkeypress="return /\d/.test(String.fromCharCode(((event||window.event).which||(event||window.event).which)));" type="text" name="myinput" id="myinput3" maxlength="1" size="2" style="font-size:15px;height:40px;text-align:center;border: 0.1px solid #C8C8C8;"/>
                          <input  onkeypress="return /\d/.test(String.fromCharCode(((event||window.event).which||(event||window.event).which)));" type="text" name="myinput" id="myinput4" maxlength="1" size="2" style="font-size:15px;height:40px;text-align:center;border: 0.1px solid #C8C8C8;"/>
                          <input  onkeypress="return /\d/.test(String.fromCharCode(((event||window.event).which||(event||window.event).which)));" type="text" name="myinput" id="myinput5" maxlength="1" size="2" style="font-size:15px;height:40px;text-align:center;border: 0.1px solid #C8C8C8;"/>
                        </span><center><br><br>



                        {{-- <input type="text" name="mycode" id="pincode-input1"> --}}
                        {{-- <input type="text" id="demo"> --}}
                        <p id="verifyConfirm2" style="font-size: 12px;font-weight:1000"></p>
                        <button class="resend btn btn-primary" type="button" style="color:black;border-color:#FCD206;background-color:#FCD206;display:;margin:auto" disabled>Resend Code <span class="c" ></span></button>
                        <a href="#" class="num1 btn btn-primary" style="color:black;border-color:#FCD206;background-color:#FCD206;display:;margin:auto" >Confirm</a>
                    </div>
                </div>
            </div>

    </div>





    <!-- Used to display form errors. -->
    <div id="card-errors" role="alert" style="margin:auto"></div>
  </div>
<center><br>
    <button type="button" class="num btn btn-primary" style="z-index:0;color:black;border-color:#FCD206;background-color:#FCD206;display:;margin:auto">verify</button>
    <button type="button" class="confir btn btn-primary" style="display:none;z-index:0;color:black;border-color:#FCD206;background-color:#FCD206;display:;margin:auto"><span class="spinner-border spinner-border-sm"  role="status" aria-hidden="true" style="display:none"></span>Confirm</button>
    <br>
  {{-- <button  class="btn btn-primary" type="button" >
    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" ></span>
    Confirm
  </button> --}}
 {{-- /////////////////////////////////////////////////////////////////////////////////////////////////////////// --}}
  <br><center>
{{-- </form> --}}

                        </div>
                        </div>
          </div>
        </div>
</section>



{{-- {{auth()->user()->name}} --}}




<script>


  jQuery(document).ready(function () {

    $(".num").attr("disabled", true);

    $(document).keypress(
        function(event){
            if (event.which == '13') {
            event.preventDefault();
            }
        });



    $( ".teli" ).on('keydown keyup change',function() {
                    var min = 8;
                    var cur=$(this).val().length;
                    console.log(cur);
                    if (cur >= min)
                    {console.log('reach')
                        $(".num").attr("disabled", false);
                    }
                    else{
                        $(".num").attr("disabled", true);
                    }
                    });


                    $('.resend').click(function()
{       $(".resend").attr("disabled", true);
        $(".overlay").css("display", "block");
        $(".num1").css("display", "inline-block");
            var person=new Object();
            person.phone=$('#phone').val();

            if(person.phone[0]=='0')
            {
                console.log('zero detected');
                person.phone=person.phone.slice(1);
            }

            person.phone='+61'+person.phone;
            console.log(person.phone);
            var len=$("#phone").val().length
            console.log(len);

            if(len>=8)
                {
                    console.log('its here');

                                                             $.ajax({
                                                            url: '/api/code',
                                                            type: 'POST',
                                                            dataType: 'json',
                                                            data: person,
                                                            success: function (data) {
                                                                        console.log(data);
                                                            },
                                                            error: function (request, status, error) {
                                                                    // alert(request.responseText);
                                                                    $('#verifyConfirm2').text('Invalid Phone Number');
                                                                    $('#verifyConfirm2').css('color','red')
                                                                        console.log(request.responseText)

                                                                    }
                                                        });

                }
                 /////////////////

            var c=30;
            $('.c').text('00:'+c);

            setInterval(function(){
                            c--;
                            if(c>=10){
                                $('.c').text('00:'+c);
                            }
                            else if(c<10 && c>=0){

                                $('.c').text('00:0'+c);
                            }
                            else if(c==-1){
                            // console.log('active')

                            $(".resend").attr("disabled", false);
                            }

                            else{

                            }
                        },1000);


});



$('.num').click(function(){
                $(".resend").attr("disabled", true);

                var c=30;
                $('.c').text('00:'+c);

                setInterval(function(){
                    c--;
                    if(c>=10){
                        $('.c').text('00:'+c);
                    }
                    else if(c<10 && c>=0){

                        $('.c').text('00:0'+c);
                    }
                    else if(c==-1){
                    console.log('active')

                    $(".resend").attr("disabled", false);

                    }
                    else{

                    }
                },1000);
            });


    $("#close").click(function(){

                $(".overlay").css("display", "none");
    });

    $(".num1").click(function(){
                    var codev=new Object();


                    var a=$('#myinput0').val()
                    var b=$('#myinput1').val()
                    var c=$('#myinput2').val()
                    var d=$('#myinput3').val()
                    var e=$('#myinput4').val()
                    var f=$('#myinput5').val()

                    var value=a+b+c+d+e+f;
                    console.log(value);



                    codev.verification_code=value;
                    codev.phone=$('#phone').val();
                    if(codev.phone[0]=='0')
                        {
                           console.log('zero detected');

                           codev.phone=codev.phone.slice(1);
                        }
                    codev.phone='+61'+codev.phone;

                    //console.log(codev.code);

                    $.ajax({
                                url: '/api/verify-code',
                                type: 'POST',
                                dataType: 'json',
                                data: codev,
                                success: function (data) {
                                    if(data.message=='Verified'){
                                            $(".sub").css("display", "block");
                                            $(".num").css("display", "none");
                                            $(".overlay").css("display", "none");
                                            $(".confir").css("display", "inline-block");
                                            $(".num").css("display", "none");
                                            $('#verifyConfirm').text('Phone number has been verified');
                                            $('#verifyConfirm').css('color','green')
                                            $('.teli').prop("readonly",true)
                                            $('#myinput0').prop("disabled",true);
                                            $('#myinput1').prop("disabled",true);
                                            $('#myinput2').prop("disabled",true);
                                            $('#myinput3').prop("disabled",true);
                                            $('#myinput4').prop("disabled",true);
                                            $('#myinput5').prop("disabled",true);

                                        }
                                    else{
                                            $(".num1").css("display", "none");
                                            $('#verifyConfirm2').text('Phone number verification failed');
                                            $('#verifyConfirm2').css('color','red')




                                    }
                                },
                                error: function (request, status, error) {
                // alert(request.responseText);
                                        console.log(request.responseText)
                                    }
                            });


    });




    $(".num").click(function(){
        //$(".popupi").css("display", "block");

                    var person=new Object();






                    person.phone=$('#phone').val();
                    if(person.phone[0]=='0')
                        {
                           console.log('zero detected');
                           person.phone=person.phone.slice(1);
                        }
                    person.phone='+61'+person.phone;



                    var len=$("#phone").val().length
                    console.log(len);
                    if(len>=8)
                            {console.log('its here');

                             person.role="<?php echo auth()->user()->role?>";

                             $(".overlay").css("display", "block");

                             $.ajax({
                                                            url: '/api/code',
                                                            type: 'POST',
                                                            dataType: 'json',
                                                            data: person,
                                                            success: function (data) {
                                                                        console.log(data);
                                                            },
                                                            error: function (request, status, error) {
                                                                    // alert(request.responseText);
                                                                        console.log(request.responseText)
                                                                    }
                                                        });

                                    //     $.ajax({
                                    //     url: '/api/uniqueNumber',
                                    //     type: 'POST',
                                    //     //dataType: 'json',
                                    //     data: person,
                                    //     success: function (data) {
                                    //                 console.log(data);
                                    //                 if(data=='new'){
                                    //                     $(".overlay").css("display", "block");
                                    //                          $.ajax({
                                    //                         url: '/api/code',
                                    //                         type: 'POST',
                                    //                         dataType: 'json',
                                    //                         data: person,
                                    //                         success: function (data) {
                                    //                                     console.log(data);
                                    //                         },
                                    //                         error: function (request, status, error) {
                                    //                                 // alert(request.responseText);
                                    //                                     console.log(request.responseText)
                                    //                                 }
                                    //                     });
                                    //                 }
                                    //                 else if(data=='exists'){

                                    //                       $('#verifyConfirm3').text('Phone number already exists');
                                    //                       $('#verifyConfirm').text(' ');

                                    //                 }
                                    //     },
                                    //     error: function (request, status, error) {
                                    //             // alert(request.responseText);
                                    //                 console.log(request.responseText)
                                    //             }
                                    // });

















                                //number not entered
                        // $.ajax({
                        //             url: '/api/code',
                        //             type: 'POST',
                        //             data: person,
                        //             success: function (data) {
                        //                 console.log(data);
                        //             },
                        //             error: function (request, status, error) {
                        //                 // alert(request.responseText);
                        //                 $('#verifyConfirm').text('Incorrect Phone Number');
                        //                     $('#verifyConfirm').css('color','red')
                        //                     $(".overlay").css("display", "none");

                        //                     console.log(request.responseText)
                        //                 }
                        //         });
                             }



                    });


        $( "#myinput0" ).keyup(function(e) {
            if(e.keyCode == 8){

            }
            else{
            var curi=$(this).val().length;
            if(curi>0)
            {
                $('#myinput1').focus();
            }}
        });

        $( "#myinput1" ).keyup(function(e) {
            if(e.keyCode == 8){

            }
            else{
                var curi=$(this).val().length;
            if(curi>0)
            {
                $('#myinput2').focus();
            }}
        });

        $( "#myinput2" ).keyup(function(e) {
            if(e.keyCode == 8){

            }
            else{
            var curi=$(this).val().length;
            if(curi>0)
            {
                $('#myinput3').focus();
            }}
        });

        $( "#myinput3" ).keyup(function(e) {
            if(e.keyCode == 8){

            }
            else{
            var curi=$(this).val().length;
            if(curi>0)
            {
                $('#myinput4').focus();
            }}
        });

        $( "#myinput4" ).keyup(function(e) {
            if(e.keyCode == 8){

            }
            else{
                var curi=$(this).val().length;
            if(curi>0)
            {
                $('#myinput5').focus();
            }}
        });

///////////////////////////////////////////////////////////////////////////////////////////////////////////////------------------------------------

        $('.confir').click(function(){
            $(".spinner-border").css("display", "inline-block");
            $(".confir").attr("disabled", true);
            var data={};
            var veri={};
            var id='<?php echo auth()->user()->id;?>';
            veri['email']='<?php echo auth()->user()->email;?>';
            var checknumber=$('#phone').val();
           //data['phone']=$('#phone').val();
           if(checknumber[0]=='0')
                        {
                           console.log('zero detected');
                           data['phone']=checknumber.slice(1);
                        }
            else{
                data['phone']=checknumber;
            }
                                            $.ajax({
                                                                    url: '/api/addcontactnumber/'+id,
                                                                    type: 'POST',
                                                                    data: data,
                                                                    success: function (data) {
                                                                        console.log(data);
                                                                        $.ajax({
                                                                            url: '/api/email-verification',
                                                                            type: 'POST',
                                                                            data: veri,
                                                                            success: function (data) {
                                                                                window.location.href = '/payment';

                                                                            },
                                                                            error: function (request, status, error) {
                                                                            console.log(error);
                                                                                            }
                                                                        });
                                                                        },
                                                                    error: function (request, status, error) {
                                                                        console.log(error);
                                                                                            }
                                            });


        });


    });




</script>
@endsection
