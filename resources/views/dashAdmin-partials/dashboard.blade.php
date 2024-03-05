<div class="sidebar" data-color="black" data-image="{{ asset('assets/img/sidebar-5.jpg')}}">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="#!" class="simple-text">
                <img src="{{ asset('assets-m/img/brand/uholulogo.png')}}" style="height:40px"alt="brand">
                </a>
            </div>

            <ul class="nav">

                @if(Auth::user()->user_admin)
                <li class="userAdmin">
                    <a href="{{ asset('/dashboard')}}">
                        <i class="pe-7s-graph"></i>
                        <p>Users</p>
                    </a>
                </li>
                @endif
                @if(Auth::user()->items_admin)
                <li class="itemAdmin">
                    <a href="{{ asset('/dashboard/Items')}}">
                        <i class="pe-7s-note2"></i>
                        <p>Items</p>
                    </a>
                </li>
                @endif
                @if(Auth::user()->activereq_admin)
                <li class="reqAdmin">
                    {{-- <a href="#!" onclick="requestPick()"> --}}
                        <a href="{{ asset('/dashboard/request')}}">
                        <i class="pe-7s-map-marker "></i>
                        {{-- pe-7s-user --}}
                        <p>Active Requests <span class="newReq dot" style="background-color:red;display:none;" ></span></p>
                    </a>
                </li>
                @endif
                @if(Auth::user()->historyreq_admin)
                <li class="historyAdmin">
                    <a href="{{ asset('/dashboard/history')}}">
                        <i class="pe-7s-news-paper"></i>
                        <p>Requests History</p>
                    </a>
                </li>
                @endif
                @if(Auth::user()->message_admin)
                <li class="messageAdmin">
                    <a href="{{ asset('/dashboard/convohistory')}}" >
                        <i class="pe-7s-bell"></i>
                        <p>Message History</p>
                    </a>
                </li>
                {{-- <li>
                    <a href="typography.html">
                        <i class="pe-7s-news-paper"></i>
                        <p>Typography</p>
                    </a>
                </li>--}}
                @endif
                @if(Auth::user()->scanreq_admin)
                <li class="scanAdmin">
                    {{-- <a href="#!" onclick="scanReset()"> --}}
                    <a href="{{ asset('/dashboard/scanreq')}}" >
                        <i class="fa fa-print"></i>
                        <p>Scan Requests <span class="newScan dot" style="background-color:red;display:none;" ></span></p>
                    </a>
                </li>
                @endif
                @if(Auth::user()->scanhistory_admin)
                <li class="scanHisAdmin">
                    <a href="{{ asset('/dashboard/scanhistory')}}">
                        <i class="pe-7s-news-paper"></i>
                        <p>Scan History</p>
                    </a>
                </li>
                @endif
                @if(Auth::user()->contact_admin)
                <li class="contactAdmin">
                    <a href="#!" onclick="contactFormReset()">
                    {{-- <a href="{{ asset('/dashboard/contactformadmin')}}"> --}}
                        <i class="fa fa-envelope"></i>
                        <p>Contact Messages <span class="newContact dot" style="background-color:red;display:none;" ></span></p>
                    </a>
                </li>
                @endif
                @if(Auth::user()->support_admin)
                <li class="customersupportadmin">
                    <a href="#!" onclick="supportReset()">
                    {{-- <a href="{{ asset('/dashboard/supportadmin')}}"> --}}
                        <i class="fa fa-envelope"></i>
                        <p>Support Messages <span class="support dot" style="background-color:red;display:none;" ></span></p>
                    </a>
                </li>
                @endif


                @if(Auth::user()->parent_id=='head')
                <li class="addaddAdmin">
                    <a href="{{ asset('/dashboard/addadmin')}}">
                        <i class="fa fa-key"></i>
                        <p>Add Administrator</p>
                    </a>
                </li>
                @endif


                {{--<li>
                    <a href="maps.html">
                        <i class="pe-7s-map-marker"></i>
                        <p>Maps</p>
                    </a>
                </li>
                <li>
                    <a href="notifications.html">
                        <i class="pe-7s-bell"></i>
                        <p>Notifications</p>
                    </a>
                </li> --}}
                {{-- <li class="active-pro">
                    <a href="upgrade.html">
                        <i class="pe-7s-rocket"></i>
                        <p>Upgrade Subscription</p>
                    </a>
                </li> --}}
            </ul>
        </div>
    </div>
