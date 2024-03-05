<div class="sidebar" data-color="black" data-image="{{ asset('assets/img/sidebar-5.jpg')}}">

<!--

    Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
    Tip 2: you can also add an image using data-image tag

-->

    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#!" class="simple-text">
            <img src="{{ asset('assets/img/uholulogo.png')}}" style="height:40px"alt="brand">
            </a>
        </div>

        <ul class="nav">
            @if(Auth::user()->storage)
            <li class="openDash1">
                <a href="{{ asset('/dashboard')}}" onclick="openDash()">
                    <i class="pe-7s-graph"></i>
                    <p>Storage</p>
                </a>
            </li>
            @endif
            @if(Auth::user()->delivery)
            <li class="requestDelivery1">
                <a href="{{ asset('/dashboard/delivery')}}" onclick="requestDelivery()">
                    <i class="pe-7s-note2"></i>
                    <p>Request Delivery <span class="delquantity dot" style="background-color:red;display:none;" ></span></p>
                </a>
            </li>
            @endif
            @if(Auth::user()->pickup)
            <li class="requestPick1">
                <a href="{{ asset('/dashboard/pickup')}}" onclick="requestPick()">
                    <i class="pe-7s-map-marker "></i>
                    {{-- pe-7s-user --}}
                    <p>Request Pickup <span class="pickquantity dot" style="background-color:red;display:none;" ></span></p>
                </a>
            </li>
            @endif
            @if(Auth::user()->active)
             <li class="activeRequest1">
                <a href="{{ asset('/dashboard/activeRequest')}}">
                    <i class="pe-7s-news-paper"></i>
                    <p>Active Request </p>
                </a>
            </li>
            @endif
            @if(Auth::user()->history)
          <li class="historyRequest1">
                <a href="{{ asset('/dashboard/HistoryRequest')}}">
                    <i class="pe-7s-science"></i>
                    <p>Request History</p>
                </a>
            </li>
            @endif
            @if(Auth::user()->staff)
                @if(auth()->user()->role=='business')
                <li class="addStaff1">
                    <a href="{{ asset('/dashboard/addStaff')}}">
                        <i class="pe-7s-bell"></i>
                        <p>Add Staff Member</p>
                    </a>
                </li>
                @endif
            @endif
            @if(Auth::user()->record)
            <li class="historyPayment1">
                  <a href="{{ asset('/dashboard/paymentHistory')}}">
                      <i class="pe-7s-science"></i>
                      <p>Payment History</p>
                  </a>
              </li>
              @endif

              @if(Auth::user()->role=='customer' || Auth::user()->role=='business')
            <li class="customersupport">
                <a href="{{ asset('/dashboard/customersupport')}}">
                    <i class="fa fa-key"></i>
                    <p>Customer Support</p>
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
            @if(Auth::user()->role=='customer' || Auth::user()->role=='business')
            <li class="active-pro">
                <a href="{{ asset('/dashboard/upgradePackage')}}">
                    <i class="pe-7s-rocket"></i>
                    <p>Upgrade Subscription</p>
                </a>
            </li>
            @endif
        </ul>
    </div>
</div>
