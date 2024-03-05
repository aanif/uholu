@extends('dash-layout')

@section('content')
<script src="https://js.stripe.com/v3/"></script>
<div id="app" style="width:100%;height:80%">

    <div class="requestPick" >

    <useractive
                    user_id="{{auth()->user()->id}}"
                    userrole="{{auth()->user()->role}}"
                    parent_id="{{auth()->user()->parent_id}}"

                    ></useractive>
    </div>

</div>
<script>
    jQuery(document).ready(function () {
        $(".activeRequest1").addClass('active');

        var active='<?php echo Auth::user()->active; ?>';

        if(!active){
            window.location.href = '/dashboard';
        }
    });
    </script>
@endsection
