@extends('main-layout-auth')

@section('content')

<main  style="height:145vh">
    <section class="section section-shaped section-lg" style="padding-top:3rem;padding-bottom:3rem">
      <div class="shape shape-style-1 shape-default" style="margin-top:80px;height: 140vh">
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
          <div class="col-lg-5">
            <div class="card bg-secondary shadow border-0" style="margin-top:00px">
              <div class="card-header bg-white pb-5">

                {{-- <div class="text-muted text-center mb-3"><small>Sign up</small></div> --}}
                {{-- <div class="text-center">
                  <a href="#" class="btn btn-neutral btn-icon mr-4">
                    <span class="btn-inner--icon">
                      <img src="{{ asset('assets-m/img/icons/common/github.svg')}}" alt="image">
                    </span>
                    <span class="btn-inner--text">Github</span>
                  </a>
                  <a href="#" class="btn btn-neutral btn-icon">
                    <span class="btn-inner--icon">
                      <img src="{{ asset('assets-m/img/icons/common/google.svg')}}" alt="image">
                    </span>
                    <span class="btn-inner--text">Google</span>
                  </a>
                </div> --}}
              </div>
              <div class="card-body px-lg-5 py-lg-5">
                <div class="text-center text-muted mb-4">
                  <small>sign up with credentials</small>
                </div>
                <form method="POST" action="{{ route('register') }}" id="cpa-form">
                @csrf


                {{-- <div class="form-group">
                    <div class="input-group input-group-alternative mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                      </div>
                       <select class="form-control" name="type" id="type" REQUIRED>
                             <option value="">Account Type</option>
                            <option class="form-control" value="customer">Personal Account</option>
                            <option class="form-control" value="business">Business Account</option>
                       </select>
                       @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                       <span class="popuptext" id="myPopup">length of name should be 3-30 charecters</span>
                    </div>
                  </div> --}}


                  <div class="form-group">
                    <div class="input-group input-group-alternative mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                      </div>
                       <input class="form-control"  value="{{ old('name') }}" placeholder="First Name" type="text" name="name" id="name" REQUIRED>
                       @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                      {{-- <span class="popuptext" id="myPopup">length of name should be 3-30 charecters</span> --}}
                    </div>
                    <p id="name_error" style="font-size: 11px;color:red"></p>
                  </div>

                  <div class="form-group">
                    <div class="input-group input-group-alternative mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                      </div>
                       <input class="form-control"  value="{{ old('last_name') }}" placeholder="Last Name" type="text" name="last_name" id="last_name" REQUIRED>
                       @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                      {{-- <span class="popuptext" id="myPopup">length of name should be 3-30 charecters</span> --}}
                    </div>
                    <p id="last_error" style="font-size: 11px;color:red"></p>
                  </div>

                  <div class="form-group">
                    <div class="input-group input-group-alternative mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                      </div>
                      <input class="form-control"  value="{{ old('email') }}" placeholder="Email" type="email" name="email" id="email" REQUIRED>
                      {{-- @if ($errors->has('email')) --}}
                      {{-- <span class="help-block">
                        <strong><p id="email_error"></p></strong>
                        <strong>{{ $errors->first('email') }}</strong>
                      </span> --}}
                  {{-- @endif --}}

                      {{-- <span class="popuptext" id="myPopup1">please enter email</span> --}}
                    </div>
                    <p id="email_error" style="font-size: 11px;color:red"></p>

                  </div>
                  <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                      </div>
                      <input class="form-control"   placeholder="Password" type="password" name="password" id="password"  REQUIRED>
                      <center> <span class="help-block" style="align:auto">
                    </span></center>
                      @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                      {{-- <span class="popuptext" id="myPopup2">length of password should more than 8 charecters</span>         <!--pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"-->--}}
                    </div>
                    <p  style="font-size: 11px;color:#191D4D"><b>Minimum 8 charecter long password for the beta version</b></p>
                    <p id="password_error" style="font-size: 11px;color:red"></p>
                </div>
                  {{-- <div class="text-muted font-italic"><small>password strength: <span class="text-success font-weight-700">strong</span></small></div> --}}

                  <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                      </div>
                      <input class="form-control"   placeholder="Re-enter Password" type="password" name="password_confirmation" id="repassword" REQUIRED>
                      {{-- <span class="popuptext" id="myPopup3">password doesn't match</span> --}}
                    </div>
                    <p id="repassword_error" style="font-size: 11px;color:red"></p>
                  </div>

                  <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                      </div>
                      <input class="form-control"   placeholder="Date of Birth" type="date" name="dob" id="dob" REQUIRED>
                      {{-- <span class="popuptext" id="myPopup3">password doesn't match</span> --}}
                    </div>
                    <p style="font-size: 11px;color:#191D4D"><b>Date of birth</b></p>
                    <p id="dob_error" style="font-size: 11px;color:red"></p>

                  </div>

                    <!--<div class="form-group" >
                            <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-phone"> &nbsp<p style="display:inline-block;margin-bottom:0rem"> +61</p></i></span>
                            </div>
                            <input class="teli form-control"  value="{{ old('phone') }}" placeholder="Phone Number" type="tel" name="phone" id="phone" >
                            <center> <span class="help-block" style="align:auto">

                            </span></center>
                        </div>
                        <p id="verifyConfirm" style="font-size: 11px;color:#191D4D"><b>Minimum 8 charecter long telephone for the beta version</b></p>
                    </div>-->


                        {{-- <div id="subscriber_form" >
                                <div id="sub_div_form">
                                     <span id="kv_form_close"> x </span>
                                          <!-- You HTML Content which will Appear on the popup -->
                                </div>
                          </div> --}}
                        <!--<div style="display:" class="form-group">
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
                                                <p id="verifyConfirm2" style="font-size: 12px;"></p>
                                                <button class="resend btn btn-primary" type="button" disabled>Resend Code <span class="c" ></span></button>
                                                <a href="#" class="num1 btn btn-primary"  >Confirm</a>
                                            </div>
                                        </div>
                                    </div>

                            </div>-->





                  <div class="row my-4">
                    <div class="col-12">
                      <div class="custom-control custom-control-alternative custom-checkbox">
                        <input class="custom-control-input" id="mark" type="checkbox" REQUIRED>
                        <label class="custom-control-label" for="mark"><span>I agree with <a href="/termsAgreement">privacy policy, website terms and conditions.</a></span></label>
                        <p id="mark_error" style="font-size: 11px;color:red"></p>

                </div>
                    </div>
                  </div>
                  <div class="input-group " >

                        <!--<div class="input-group-prepend" style="margin:auto">
                                {{-- <button  class="num btn btn-primary" >verify</button> --}}
                                  <button type="button" class="num btn btn-primary" style="z-index:0">verify</button>
                        </div>-->

                        </div>
                  <div class="text-center">
                 <button type="button" class="sub btn btn-primary mt-4" style="color:black;border-color:#FCD206;background-color:#FCD206;display:;margin:auto">Create account</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <br><br><br>
  </main>

  <script>


jQuery(document).ready(function () {
    $('#email_error').text('');


    $(".sub").on('click',function(e){
        $('#email_error').text('');
        $('#name_error').text('');
        $('#last_error').text('');
        $('#password_error').text('');
        $('#repassword_error').text('');
        $('#dob_error').text('');
        $('#mark_error').text('');
    var user={}

    user['email']=$('#email').val();

    var name=$('#name').val();
    var last_name=$('#last_name').val();
    var password=$('#password').val();
    var repassword=$('#repassword').val();
    var dob=$('#dob').val();
    var mark=$('#mark').val();

    if(password){
        if(password.length<8){
            $('#password_error').text('Password should be more than 8 character');
            return false;
        }
    }

    if(!name){
        $('#name_error').text('Enter your name');
    }
    else if(!last_name){
        $('#last_error').text('Enter Last name');
    }
    else if(!password){
        $('#password_error').text('Please enter password');
    }
    else if(!repassword)
    {
        $('#repassword_error').text('Please enter your password again');
    }
    else if(!user['email']){
        $('#email_error').text('Please enter your email');
    }
    else if(!dob){
        $('#dob_error').text('Enter your Date of birth');
    }
    else if (!$('#mark').is(":checked")){
        $('#mark_error').text('Please check the box');
    }
    else if(password!=repassword){
        $('#password_error').text('Passwords do not match');
    }
    else{

        var register_info={};
        register_info['name']=name;
        register_info['email']=user['email'];
        register_info['password']=password;
        register_info['last_name']=last_name;
        register_info['date_of_birth']=dob;
                        $.ajax({
                                        url: '/api/uniqueEmailId',
                                        type: 'POST',
                                        //dataType: 'json',
                                        data: user,
                                        success: function (data) {
                                                   // console.log(data);
                                                   if(data=='unique'){
                                                        //return true;



                                                    $.ajax({
                                                        url: '/api/auth/register',
                                                        type: 'POST',
                                                        data: register_info,
                                                        success: function (data) {
                                                            window.location.href = '/contactnumber';
                                                        },
                                                        error: function (request, status, error){

                                                        }
                                                    });



                                                        // $("#cpa-form").submit();
                                                        //form.submit();
                                                        i=0;
                                                   }
                                                   else if(data=='exists'){

                                                        $('#email_error').text('Email already exists');
                                                        i=2;

                                                   }
                                        },
                                        error: function (request, status, error) {

                                                    console.log(request.responseText)
                                                }
                                    });

    }
            // while(i){
            //     setTimeout(() => console.log('i'), 5000);
            //     if(i==2){
            //         return false;
            //     }

            // }


  });



//   $.ajax({
//                                         url: '/api/code',
//                                         type: 'POST',
//                                         dataType: 'json',
//                                         data: person,
//                                         success: function (data) {
//                                                     console.log(data);
//                                         },
//                                         error: function (request, status, error) {

//                                                     console.log(request.responseText)
//                                                 }
//                                     });





//     $(".num").attr("disabled", true);

// $('.resend').click(function()
// {       $(".resend").attr("disabled", true);
//         $(".overlay").css("display", "block");
//         $(".num1").css("display", "inline-block");
//             var person=new Object();
//             person.phone=$('#phone').val();
//             console.log(person.phone);
//             var len=$("#phone").val().length
//             console.log(len);
//             if(len>=8)
//                 {console.log('its here');
//                     //number not entered
//                             $.ajax({
//                                         url: '/api/code',
//                                         type: 'POST',
//                                         dataType: 'json',
//                                         data: person,
//                                         success: function (data) {
//                                                     console.log(data);
//                                         },
//                                         error: function (request, status, error) {
//                                                 // alert(request.responseText);
//                                                     console.log(request.responseText)
//                                                 }
//                                     });
//                 }
//                  /////////////////

//             var c=20;
//             $('.c').text('00:'+c);

//             setInterval(function(){
//                             c--;
//                             if(c>=10){
//                                 $('.c').text('00:'+c);
//                             }
//                             else if(c<10 && c>=0){

//                                 $('.c').text('00:0'+c);
//                             }
//                             else if(c==-1){
//                             // console.log('active')

//                             $(".resend").attr("disabled", false);
//                             }

//                             else{

//                             }
//                         },1000);


// });



// $('.num').click(function(){
//                 $(".resend").attr("disabled", true);

//                 var c=20;
//                 $('.c').text('00:'+c);

//                 setInterval(function(){
//                     c--;
//                     if(c>=10){
//                         $('.c').text('00:'+c);
//                     }
//                     else if(c<10 && c>=0){

//                         $('.c').text('00:0'+c);
//                     }
//                     else if(c==-1){
//                     console.log('active')

//                     $(".resend").attr("disabled", false);

//                     }
//                     else{

//                     }
//                 },1000);
//             });



//     //.css("display", "block");
//     $("#close").click(function(){

//         $(".overlay").css("display", "none");
//     });







//        //$( ".teli" ).change(function() {
//         $( ".teli" ).on('keydown keyup change',function() {
//                     var min = 8;
//                     var cur=$(this).val().length;
//                     console.log(cur);
//                     if (cur >= min)
//                     {console.log('reach')
//                         $(".num").attr("disabled", false);
//                     }
//                     else{
//                         $(".num").attr("disabled", true);
//                     }
//                     });


//     $(".num1").click(function(){
//                     var codev=new Object();


//                     var a=$('#myinput0').val()
//                     var b=$('#myinput1').val()
//                     var c=$('#myinput2').val()
//                     var d=$('#myinput3').val()
//                     var e=$('#myinput4').val()
//                     var f=$('#myinput5').val()

//                     var value=a+b+c+d+e+f;
//                     console.log(value);



//                     codev.checkcode=value;
//                     codev.phone=$('#phone').val();
//
//                     //console.log(codev.code);

//                     $.ajax({
//                                 url: '/api/codes',
//                                 type: 'POST',
//                                 dataType: 'json',
//                                 data: codev,
//                                 success: function (data) {
//                                     console.log(data);
//                                     if(data=='success'){
//                                             $(".sub").css("display", "block");
//                                             $(".num").css("display", "none");
//                                             $(".overlay").css("display", "none");
//                                             $('#verifyConfirm').text('Phone number has been verified');
//                                             $('#verifyConfirm').css('color','green')
//                                             $('.teli').prop("readonly",true)
//                                             $('#myinput0').prop("disabled",true);
//                                             $('#myinput1').prop("disabled",true);
//                                             $('#myinput2').prop("disabled",true);
//                                             $('#myinput3').prop("disabled",true);
//                                             $('#myinput4').prop("disabled",true);
//                                             $('#myinput5').prop("disabled",true);

//                                         }
//                                     else{
//                                             $(".num1").css("display", "none");
//                                             $('#verifyConfirm2').text('Phone number verification failed');
//                                             $('#verifyConfirm2').css('color','red')




//                                     }
//                                 },
//                                 error: function (request, status, error) {
//                 // alert(request.responseText);
//                                         console.log(request.responseText)
//                                     }
//                             });


//     });




//     $(".num").click(function(){
//         //$(".popupi").css("display", "block");
//                     $(".overlay").css("display", "block");
//                     var person=new Object();
//                     person.phone=$('#phone').val();
//
//                     console.log(person.phone);
//                     console.log(person.phone);
//                     var len=$("#phone").val().length
//                     console.log(len);
//                     if(len>=8)
//                             {console.log('its here');
//                                 //number not entered
//                         $.ajax({
//                                     url: '/api/code',
//                                     type: 'POST',
//                                     data: person,
//                                     success: function (data) {
//                                         console.log(data);
//                                     },
//                                     error: function (request, status, error) {
//                                         // alert(request.responseText);
//                                         $('#verifyConfirm').text('Incorrect Phone Number');
//                                             $('#verifyConfirm').css('color','red')
//                                             $(".overlay").css("display", "none");

//                                             console.log(request.responseText)
//                                         }
//                                 });
//                              }



//                     });


//         $( "#myinput0" ).keyup(function(e) {
//             if(e.keyCode == 8){

//             }
//             else{
//             var curi=$(this).val().length;
//             if(curi>0)
//             {
//                 $('#myinput1').focus();
//             }}
//         });

//         $( "#myinput1" ).keyup(function(e) {
//             if(e.keyCode == 8){

//             }
//             else{
//                 var curi=$(this).val().length;
//             if(curi>0)
//             {
//                 $('#myinput2').focus();
//             }}
//         });

//         $( "#myinput2" ).keyup(function(e) {
//             if(e.keyCode == 8){

//             }
//             else{
//             var curi=$(this).val().length;
//             if(curi>0)
//             {
//                 $('#myinput3').focus();
//             }}
//         });

//         $( "#myinput3" ).keyup(function(e) {
//             if(e.keyCode == 8){

//             }
//             else{
//             var curi=$(this).val().length;
//             if(curi>0)
//             {
//                 $('#myinput4').focus();
//             }}
//         });

//         $( "#myinput4" ).keyup(function(e) {
//             if(e.keyCode == 8){

//             }
//             else{
//                 var curi=$(this).val().length;
//             if(curi>0)
//             {
//                 $('#myinput5').focus();
//             }}
//         });




});

</script>

  @endsection
