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
            {{-- <ul class="nav navbar-nav navbar-left">
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-dashboard"></i>
                        <p class="hidden-lg hidden-md">Dashboard</p>
                    </a>
                </li>
                <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-globe"></i>
                            <b class="caret hidden-lg hidden-md"></b>
                            <p class="hidden-lg hidden-md">
                                5 Notifications
                                <b class="caret"></b>
                            </p>
                      </a>
                      <ul class="dropdown-menu">
                        <li><a href="#">Notification 1</a></li>
                        <li><a href="#">Notification 2</a></li>
                        <li><a href="#">Notification 3</a></li>
                        <li><a href="#">Notification 4</a></li>
                        <li><a href="#">Another notification</a></li>
                      </ul>
                </li>
                <li>
                   <a href="">
                        <i class="fa fa-search"></i>
                        <p class="hidden-lg hidden-md">Search</p>
                    </a>
                </li>
            </ul> --}}

            <ul class="nav navbar-nav navbar-right">
                {{-- <li>
                   <a href="">
                       <p>Account</p>
                    </a>
                </li> --}}
                <li class="">
                      <a href="#" class="">
                            <p>
                                {{auth()->user()->name}}
                                {{-- <b class="caret"></b> --}}
                            </p>

                      </a>

                </li>
                <li  onclick="openProfile()">
                    <a href="{{ asset('/dashboard/changePassword')}}">
                        <p>Change Password</p>
                    </a>
                </li>
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



            var stored_request_count='<?php echo auth()->user()->activereq_counter ?>';
            var delivery_counter_current;
            var pickup_counter_current;
            var total_request_count;



            $.ajax({
                                    url: '/api/deliveryCounter',
                                    type: 'GET',
                                    //dataType: 'json',
                                    //data: codev,
                                    success: function (data) {
                                        delivery_counter_current=data;


                                        $.ajax({
                                            url: '/api/pickupCounter',
                                            type: 'GET',
                                            //dataType: 'json',
                                            //data: codev,
                                            success: function (data) {
                                                pickup_counter_current=data;

                                                total_request_count=delivery_counter_current+pickup_counter_current;
                                                if(total_request_count==0){
                                                    $(".newReq").css("display", "none");
                                                }
                                                else{
                                                    $(".newReq").css("display", "inline-block");
                                                    //console.log('not equeal');
                                                }


                                            },
                                            error: function (request, status, error) {

                                                    console.log(request.responseText)
                                                }
                                        });



                                    },
                                    error: function (request, status, error) {

                                            console.log(request.responseText)
                                        }
                                });




            var scan_request_count;
            var scan_request_stored='<?php echo auth()->user()->scanreq_counter ?>';




            $.ajax({
                                    url: '/api/scanactiveCount',
                                    type: 'GET',
                                    //dataType: 'json',
                                    //data: codev,
                                    success: function (data) {
                                        //console.log(data);
                                        scan_request_count=data;
                                        if(scan_request_count==0){
                                            $(".newScan").css("display", "none");
                                        }
                                        else{
                                            $(".newScan").css("display", "inline-block");

                                        }
                                    },
                                    error: function (request, status, error) {

                                            console.log(request.responseText)
                                        }
                                });

            var contactform_counter;
            var contactfor_current_stored='<?php echo auth()->user()->contact_counter ?>';


            $.ajax({
                                    url: '/api/contactformcount',
                                    type: 'GET',
                                    //dataType: 'json',
                                    //data: codev,
                                    success: function (data) {
                                        //console.log(data);
                                        contactform_counter=data;
                                        if(contactfor_current_stored==contactform_counter){
                                            $(".newContact").css("display", "none");
                                        }
                                        else{
                                            $(".newContact").css("display", "inline-block");

                                        }
                                    },
                                    error: function (request, status, error) {

                                            console.log(request.responseText)
                                        }
                                });



            var pre_support_count='<?php echo auth()->user()->support_counter ?>';
            var now_support_count;
                                $.ajax({
                                    url: '/api/supportCounter',
                                    type: 'GET',
                                    //dataType: 'json',
                                    //data: codev,
                                    success: function (data) {
                                        //console.log(data);
                                        now_support_count=data;
                                        if(now_support_count==pre_support_count){
                                            $(".support").css("display", "none");
                                        }
                                        else{
                                            $(".support").css("display", "inline-block");

                                        }
                                    },
                                    error: function (request, status, error) {

                                            console.log(request.responseText)
                                        }
                                });



        }
        function stopFunction(){
            clearInterval(myVar); // stop the timer
        }

        function contactFormReset(){
            var id='<?php echo auth()->user()->id ?>';
            $.ajax({
                                    url: '/api/contactformcount',
                                    type: 'GET',
                                    //dataType: 'json',
                                    //data: codev,
                                    success: function (data) {
                                        //console.log(data);
                                        contactform_counter=data;
                                        var contact={};
                                        contact['new_value']=contactform_counter;
                                        $.ajax({
                                                        url: '/api/updateContactFormCount/'+id,
                                                        type: 'POST',
                                                        data: contact,
                                                        success: function (data) {
                                                            //console.log(data);
                                                            window.location.href = '/dashboard/contactformadmin'
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

        function supportReset(){
            var id='<?php echo auth()->user()->id ?>';
            $.ajax({
                                    url: '/api/supportCounter',
                                    type: 'GET',
                                    //dataType: 'json',
                                    //data: codev,
                                    success: function (data) {
                                        //console.log(data);
                                        //scan_request_count=data;
                                        var Support={};
                                        Support['new_value']=data;
                                        $.ajax({
                                                        url: '/api/updateSupportCount/'+id,
                                                        type: 'POST',
                                                        data: Support,
                                                        success: function (data) {
                                                            //console.log(data);
                                                            window.location.href = '/dashboard/supportadmin'
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

        function scanReset(){
            var id='<?php echo auth()->user()->id ?>';
            $.ajax({
                                    url: '/api/scanactiveCount/',
                                    type: 'GET',
                                    //dataType: 'json',
                                    //data: codev,
                                    success: function (data) {
                                        //console.log(data);
                                        scan_request_count=data;
                                        var Scan={};
                                        Scan['new_value']=scan_request_count;
                                        $.ajax({
                                                        url: '/api/updateActiveScanCount/'+id,
                                                        type: 'POST',
                                                        data: Scan,
                                                        success: function (data) {
                                                            //console.log(data);
                                                            window.location.href = '/dashboard/scanreq'
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

        function requestPick(){
            var id='<?php echo auth()->user()->id ?>';
            $.ajax({
                                    url: '/api/deliveryCounter',
                                    type: 'GET',
                                    //dataType: 'json',
                                    //data: codev,
                                    success: function (data) {
                                        delivery_counter_current=data;


                                        $.ajax({
                                            url: '/api/pickupCounter',
                                            type: 'GET',
                                            //dataType: 'json',
                                            //data: codev,
                                            success: function (data) {
                                                pickup_counter_current=data;

                                                total_request_count=delivery_counter_current+pickup_counter_current;
                                                var Val={};
                                                Val['new_value']=total_request_count;


                                                $.ajax({
                                                        url: '/api/updateActiveRequestCount/'+id,
                                                        type: 'POST',
                                                        data: Val,
                                                        success: function (data) {
                                                            //console.log(data);
                                                            window.location.href = '/dashboard/request'
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



                                    },
                                    error: function (request, status, error) {

                                            console.log(request.responseText)
                                        }
                                });





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
