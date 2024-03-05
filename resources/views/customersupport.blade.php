@extends('dash-layout')

@section('content')
<script src="https://js.stripe.com/v3/"></script>
<div id="app" style="width:100%;height:80%">

    <div class="requestPick" >

    <support
                    user_id="{{auth()->user()->id}}"
                    user_name="{{auth()->user()->name}}"
                    user_role="{{auth()->user()->role}}"
                    user_email="{{auth()->user()->email}}"



                    ></support>
    </div>

</div>
<script>
    jQuery(document).ready(function () {
        $(".customersupport").addClass('active');


    });
    </script>
@endsection
