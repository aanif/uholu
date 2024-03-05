<nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid1">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Dashboard</a>
                </div>









                <div class="collapse navbar-collapse">
                     <ul class="nav navbar-nav navbar-left">
                        {{--<li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
								<p class="hidden-lg hidden-md">Dashboard</p>
                            </a>
                        </li>--}}
                        <li class="noti dropdown">
                              <a href="#!" class="dropdown-toggle"  onclick="clickedFunction()">
                                    Messages <span class="new dot" style="background-color:red;display:none;" ></span>

                              </a>

                        </li>
                        {{--<li>
                           <a href="">
                                <i class="fa fa-search"></i>
								<p class="hidden-lg hidden-md">Search</p>
                            </a>
                        </li>--}}
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        {{-- <li>
                           <a href="">
                               <p>Account</p>
                            </a>
                        </li> --}}
                        @if(auth()->user()->role=='customer')
                        <li class="">
                              <a  class="">
                                    <p>
                                        <b>Hi, </b>{{auth()->user()->name}}<span style="font-size:12px"> (<b>ID:</b> 1003{{auth()->user()->id}})</span>
										{{-- <b class="caret"></b> --}}
									</p>

                              </a>

                        </li>
                        @endif
                        @if(auth()->user()->role=='business')
                        <li class="">
                              <a  class="">
                                    <p>
                                        <b>Hi, </b>{{auth()->user()->name}}<span style="font-size:12px"> (<b>ID:</b> 2003{{auth()->user()->id}})</span>
										{{-- <b class="caret"></b> --}}
									</p>

                              </a>

                        </li>
                        @endif
                        @if(Auth::user()->role=='customer' || Auth::user()->role=='business')
                        <li  onclick="openProfile()">
                            <a href="{{ asset('/dashboard/profile')}}">
                                <p>Edit Profile</p>
                            </a>
                        </li>
                        @endif
                        <li>
                            <a href="{{ asset('/logout')}}">
                                <p>Log out</p>
                            </a>
                        </li>
						<li class="separator hidden-lg"></li>
                    </ul>
                </div>
            </div>
        </nav>
<script>
var myVar;
    function showTime(){
        // var d = new Date();
        // var t = d.toLocaleTimeString();
        //console.log('called')
        //$("#demo").html(t); // display time on the page
        var previous='<?php echo auth()->user()->message_counter ?>';
        var current;
        var id='<?php echo auth()->user()->id ?>';
        $.ajax({
                                url: '/api/messageUserCount/'+id,
                                type: 'GET',
                                //dataType: 'json',
                                //data: codev,
                                success: function (data) {
                                    //console.log(data);
                                    current=data;
                                    if(previous==current){
                                        $(".new").css("display", "none");
                                    }
                                    else{
                                        $(".new").css("display", "inline-block");

                                    }
                                },
                                error: function (request, status, error) {

                                        console.log(request.responseText)
                                    }
                            });


            var pickc=0;
            var delc=0;
            var newNoti={};
            newNoti['stripe_id']="<?php echo auth()->user()->stripe_id ?>";
            user_id="<?php echo auth()->user()->id ?>";

            $.ajax({
                                    url: '/api/get-docs-for-delivery',
                                    type: 'GET',
                                    success: function (data) {
                                        delc=delc+data.length;
                                        $.ajax({
                                            url: '/api/get-keys-for-delivery',
                                            type: 'GET',
                                            success: function (data) {
                                                delc=delc+data.length;
                                                if(delc > 0){
                                                    $(".delquantity").css("display", "inline-block");
                                                }
                                                else{
                                                    $(".delquantity").css("display", "none");
                                                }
                                            },
                                            error: function (request, status, error) {}
                                        });
                                    },
                                    error: function (request, status, error) {}
                                });
            $.ajax({
                                    url: '/api/get-docs-for-pickup',
                                    type: 'GET',
                                    success: function (data) {
                                        pickc=pickc+data.length;
                                        $.ajax({
                                            url: '/api/get-keys-for-pickup',
                                            type: 'GET',
                                            success: function (data) {
                                                pickc=pickc+data.length;
                                                if(pickc > 0){
                                                    $(".pickquantity").css("display", "inline-block");
                                                }
                                                else{
                                                    $(".pickquantity").css("display", "none");
                                                }


                                            },
                                            error: function (request, status, error) {}
                                        });
                                    },
                                    error: function (request, status, error) {}
                                });


    }
    function stopFunction(){
        clearInterval(myVar); // stop the timer
    }
    function clickedFunction(){
            //console.log("it ran");
            var newValue={};
            var id='<?php echo auth()->user()->id ?>';

        $(".new").css("display", "none");
        $.ajax({
                                url: '/api/messageUserCount/'+id,
                                type: 'GET',
                                //dataType: 'json',
                                //data: codev,
                                success: function (data) {
                                    //console.log(data);
                                    newValue['counterVal']=data;



                                    $.ajax({
                                    url: '/api/update-message-counter/'+id,
                                    type: 'GET',
                                    success: function (data) {
                                        //console.log(data);
                                        window.location.href = '/dashboard/messages'
                                    },
                                    error: function (request, status, error) {
                // alert(request.responseText);
                                        console.log(request.responseText)
                                    }
                            });





                                },
                                error: function (request, status, error) {

                                        console.log(request.responseText)
                                    }
                            });

    }
    $(document).ready(function(){
        myVar = setInterval("showTime()", 5000);

    });
</script>

