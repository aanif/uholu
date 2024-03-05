@extends('dash-layout')

@section('content')
<script src="https://js.stripe.com/v3/"></script>
<div id="app" style="width:100%;height:80%">

    <div class="requestPick" >

    <userhistory
                    user_id="{{auth()->user()->id}}"
                    userrole="{{auth()->user()->role}}"
                    parent_id="{{auth()->user()->parent_id}}"

                    ></userhistory>
    </div>

</div>
<script>
    jQuery(document).ready(function () {
        $(".historyRequest1").addClass('active');

        var history='<?php echo Auth::user()->history; ?>';
        if(!history){
            window.location.href = '/dashboard';
        }
    });
    </script>
@endsection
