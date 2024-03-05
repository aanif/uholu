@extends('dash-layout')

@section('content')
<script src="https://js.stripe.com/v3/"></script>
<div id="app" style="width:100%;height:80%">

    <div class="requestPick" >

    <addadmin
                    user_id="{{auth()->user()->id}}"
                    cnameauth="{{auth()->user()->cname}}"
                    {{-- ="{{auth()->user()->phone}}"
                    ="{{auth()->user()->doc_id}}"
                    ="{{auth()->user()->doc_quantity}}"
                    ="{{auth()->user()->key_id}}"
                    ="{{auth()->user()->key_quantity}}"
                    ="{{auth()->user()->stripe_id}}"
                    ="{{auth()->user()->card_brand}}"
                    ="{{auth()->user()->card_last_four}}"
                    ="{{auth()->user()->trail_ends_at}}"
                    ="{{auth()->user()->sub_id}}"
                    ="{{auth()->user()->sub_id2}}" --}}
                    authvarprofile1="{{auth()->user()->profile_check_1}}"
                    authvarprofile2="{{auth()->user()->profile_check_2}}"
                    authvarprofile3="{{auth()->user()->profile_check_3}}"




                    ></addadmin>
    </div>

</div>
<script>
    jQuery(document).ready(function () {
        $(".addaddAdmin").addClass('active');

        var role='<?php echo Auth::user()->role; ?>';

    if(role=='admin'){
        var parent='<?php echo Auth::user()->parent_id; ?>';
        var users='<?php echo Auth::user()->user_admin; ?>';
        var items='<?php echo Auth::user()->items_admin; ?>';
        var activereq='<?php echo Auth::user()->activereq_admin; ?>';
        var historyreq='<?php echo Auth::user()->historyreq_admin; ?>';
        var message='<?php echo Auth::user()->message_admin; ?>';
        var scanreq='<?php echo Auth::user()->scanreq_admin; ?>';
        var scanhis='<?php echo Auth::user()->scanhistory_admin; ?>';
        var contact='<?php echo Auth::user()->contact_admin; ?>';
        var support='<?php echo Auth::user()->support_admin; ?>';
        if(!parent){
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
