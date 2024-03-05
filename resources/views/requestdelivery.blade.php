@extends('dash-layout')

@section('content')
<script src="https://js.stripe.com/v3/"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDI97SHbFONzrqJKtK7eekrAW236_7Cu9g&libraries=places"
        >
</script>
<div id="app" style="width:100%;height:80%">

    <div  >

    <requestdelivery    stripe="{{auth()->user()->stripe_id}}"
                        user_id="{{auth()->user()->id}}"
                        doc_id="{{auth()->user()->doc_id}}"
                        doc_quantity="{{auth()->user()->doc_quantity}}"
                        key_id="{{auth()->user()->key_id}}"
                        key_quantity="{{auth()->user()->key_quantity}}"
                        authvarcity="{{auth()->user()->city}}"
                        authvarstreet="{{auth()->user()->street}}"
                        authvarunit="{{auth()->user()->unit}}"
                        authvarzip="{{auth()->user()->zip}}"
                        kemail="{{auth()->user()->payment_del}}"
                        authvarseccity="{{auth()->user()->sec_city}}"
                        authvarsecstreet="{{auth()->user()->sec_street}}"
                        authvarsecunit="{{auth()->user()->sec_unit}}"
                        authvarseczip="{{auth()->user()->sec_zip}}"
                        authvarsecinfo="{{auth()->user()->sec_info}}"
                        authvarseccheck="{{auth()->user()->sec_address_check}}"
                        authvarprofile1="{{auth()->user()->profile_check_1}}"
                        authvarprofile2="{{auth()->user()->profile_check_2}}"
                        authvarprofile3="{{auth()->user()->profile_check_3}}"
                        userrole="{{auth()->user()->role}}"
                        parent_id="{{auth()->user()->parent_id}}"

                        authvarinfo="{{auth()->user()->delivery_info}}"
        ></requestdelivery>
    </div>

</div>
<script>
    jQuery(document).ready(function () {
        $(".requestDelivery1").addClass('active');

        var delivery='<?php echo Auth::user()->delivery; ?>';

        if(!delivery){
            window.location.href = '/dashboard';
        }
    });
    </script>

@endsection
