@extends('dash-layout')

@section('content')
<script src="https://js.stripe.com/v3/"></script>
<div id="app" style="width:100%;height:80%">

<payment user_id="{{auth()->user()->id}}"></payment>

</div>
<script>
    jQuery(document).ready(function () {
        $(".historyPayment1").addClass('active');

        var history='<?php echo Auth::user()->history; ?>';
        if(!history){
            window.location.href = '/dashboard';
        }
    });
    </script>
@endsection
