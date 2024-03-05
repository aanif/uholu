@extends('dash-layout')

@section('content')
<script src="https://js.stripe.com/v3/"></script>
<div id="app" style="width:100%;height:80%">

    <div class="requestPick" >

    <addstaff
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




                    ></addstaff>
    </div>

</div>
<script>
jQuery(document).ready(function () {
    $(".addStaff1").addClass('active');
});
</script>
@endsection
