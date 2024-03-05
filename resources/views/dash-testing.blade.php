@extends('dash-layout')

@section('content')
<script src="https://js.stripe.com/v3/"></script>
<div id="app" style="width:100%;height:80%">



<div class="dashboard">
@if(Auth::user()->role== 'customer' || Auth::user()->role== 'business' || Auth::user()->role== 'staff')

        <dashboard1
                    email_verify="{{auth()->user()->email_verified_at}}"
                    address="{{auth()->user()->email}}"
                    cust_id="{{auth()->user()->id}}"
                    stripe="{{auth()->user()->stripe_id}}"
                    doc_id="{{auth()->user()->doc_id}}"
                    doc_quantity="{{auth()->user()->doc_quantity}}"
                    key_id="{{auth()->user()->key_id}}"
                    key_quantity="{{auth()->user()->key_quantity}}"
                    authvarprofile1="{{auth()->user()->profile_check_1}}"
                    authvarprofile2="{{auth()->user()->profile_check_2}}"
                    authvarprofile3="{{auth()->user()->profile_check_3}}"
                    statfor="{{auth()->user()->status}}"
                    message="{{auth()->user()->message}}"
                    roleofactive="{{auth()->user()->role}}"
                    deleteerror="{{auth()->user()->delete_error}}"

            ></dashboard1>
@endif
@if(Auth::user()->role=='admin')

<admin
active_id="{{auth()->user()->id}}"
parent_id="{{auth()->user()->parent_id}}"
></admin>
@endif

</div>










</div>
<script>
    jQuery(document).ready(function () {
        $(".openDash1").addClass('active');
        $(".userAdmin").addClass('active');
        var role='<?php echo Auth::user()->role; ?>';
        if(role!='admin'){
        var storage='<?php echo Auth::user()->storage; ?>';
        var delivery='<?php echo Auth::user()->delivery; ?>';
        var pickup='<?php echo Auth::user()->pickup; ?>';
        var active='<?php echo Auth::user()->active; ?>';
        var history='<?php echo Auth::user()->history; ?>';
        if(!storage){
            if(pickup){window.location.href = '/dashboard/pickup';}
            if(delivery){window.location.href = '/dashboard/delivery';}
            if(active){window.location.href = '/dashboard/activeRequest';}
            if(history){window.location.href = '/dashboard/HistoryRequest';}

        }
    }
    else if(role=='admin'){
        var users='<?php echo Auth::user()->user_admin; ?>';
        var items='<?php echo Auth::user()->items_admin; ?>';
        var activereq='<?php echo Auth::user()->activereq_admin; ?>';
        var historyreq='<?php echo Auth::user()->historyreq_admin; ?>';
        var message='<?php echo Auth::user()->message_admin; ?>';
        var scanreq='<?php echo Auth::user()->scanreq_admin; ?>';
        var scanhis='<?php echo Auth::user()->scanhistory_admin; ?>';
        var contact='<?php echo Auth::user()->contact_admin; ?>';
        var support='<?php echo Auth::user()->support_admin; ?>';
        if(!users){
            if(users){window.location.href = '/dashboard/';}
            if(items){window.location.href = '/dashboard/Items';}
            if(activereq){window.location.href = '/dashboard/request';}
            if(historyreq){window.location.href = '/dashboard/history';}
            if(message){window.location.href = '/dashboard/convohistory';}
            if(scanreq){window.location.href = '/dashboard/scanreq';}
            if(scanhis){window.location.href = '/dashboard/scanhistory';}
            if(support){window.location.href = '/dashboard/supportadmin';}
            if(contact){window.location.href = '/dashboard/contactformadmin';}
        }
    }
    });
    </script>
@endsection
