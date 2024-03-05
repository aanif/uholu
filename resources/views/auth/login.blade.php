@extends('main-layout-auth')

@section('content')
<main style="height:85vh">
    <section class="section section-shaped section-lg" style="padding-top:3rem;padding-bottom:3rem">
      <div class="shape shape-style-1 shape-default" style="margin-top:80px;padding-top:3rem;padding-bottom:0rem;height:90vh">
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
              {{-- <div class="card-header bg-white pb-5">
                <div class="text-muted text-center mb-3"><small>Sign in with</small></div>
                <div class="btn-wrapper text-center">
                  <a href="#" class="btn btn-neutral btn-icon">
                    <span class="btn-inner--icon">
                      <img alt="image" src="{{ asset('assets-m/img/icons/common/github.svg')}}">
                    </span>
                    <span class="btn-inner--text">Github</span>
                  </a>
                  <a href="#" class="btn btn-neutral btn-icon">
                    <span class="btn-inner--icon">
                      <img alt="image" src="{{ asset('assets-m/img/icons/common/google.svg')}}">
                    </span>
                    <span class="btn-inner--text">Google</span>
                  </a>
                </div>
              </div> --}}
              <br><br>

              <div class="card-body px-lg-5 py-lg-5" >
                <div class="text-center text-muted mb-4">
                  <small>sign in with credentials</small>
                </div>
                <form method="POST" action="{{ route('login') }}" id="cpb-form">
                @csrf
                  <div class="form-group mb-3">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                      </div>
                      <input class="form-control" placeholder="Email" type="email" name="email" id="email">
                    </div>
                    <p id="email_error" style="font-size: 11px;color:red"></p>
                  </div>
                  <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                      </div>
                      <input class="form-control" placeholder="Password" type="password" name="password" id="password">
                    </div>
                    <p id="password_error" style="font-size: 11px;color:red"></p>
                  </div>
                  <div class="custom-control custom-control-alternative custom-checkbox">
                    <input class="custom-control-input" id="customCheckLogin" type="checkbox" name="remember">
                    <label class="custom-control-label" for="customCheckLogin">
                      <span>Remember me</span>
                    </label>
                  </div>
                  <div class="text-center">
                    <button type="button" id="signin" class="btn btn-primary my-4" style="color:black;border-color:#FCD206;background-color:#FCD206;display:;margin:auto">Sign in</button>
                  </div>
                </form>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-6">
                <a href="/resetPass" class="text-light"><small  style="color:black">Forgot password?</small></a>
              </div>
              <div class="col-6 text-right">
                <a href="{{ asset('/packages?noti=package') }}" class="text-light" ><small style="color:black">Create new account</small></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <script>


    jQuery(document).ready(function () {
        $("#signin").on('click',function(e){
            $('#email_error').text('');
            $('#password_error').text('');
            var user={};
            user['email']=$('#email').val();
            user['password']=$('#password').val();
            if(!user['email']){
                $('#email_error').text('Enter Email');
            }
            else if(!user['password']){
                $('#password_error').text('Enter Password');
            }
            else{
            $.ajax({
                                        url: '/api/loginEmail',
                                        type: 'POST',
                                        //dataType: 'json',
                                        data: user,
                                        success: function (data) {
                                                   // console.log(data);
                                                   if(data=='true'){
                                                    $.ajax({
                                                        url: '/api/loginPassword',
                                                        type: 'POST',
                                                        //dataType: 'json',
                                                        data: user,
                                                        success: function (data) {
                                                                // console.log(data);
                                                                if(data=='true'){
                                                                    $.ajax({
                                                                        url: '/api/auth/login',
                                                                        type: 'POST',
                                                                        data: user,
                                                                        success: function (data) {
                                                                            window.location.href = '/dashboard';
                                                                        },
                                                                        error: function (request, status, error){

                                                                        }
                                                                    });
                                                                    // $("#cpb-form").submit();
                                                                }
                                                                else if(data=='false'){

                                                                    $('#password_error').text('Invalid Password');
                                                                }
                                                        },
                                                        error: function (request, status, error) {

                                                                    console.log(request.responseText)
                                                                }
                                                    });
                                                   }
                                                   else if(data=='false'){
                                                        $('#email_error').text('Invalid Email ID');

                                                   }
                                        },
                                        error: function (request, status, error) {

                                                    console.log(request.responseText)
                                                }
                                    });
          }
            });
    });

  </script>
  @endsection
