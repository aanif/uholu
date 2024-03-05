@extends('dash-layout')

@section('content')
<script src="https://js.stripe.com/v3/"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDI97SHbFONzrqJKtK7eekrAW236_7Cu9g&libraries=places"
        >
</script>
<div id="app" style="width:100%;height:80%">



        <profile
        authvarid="{{auth()->user()->id}}"
        authvarname="{{auth()->user()->name}}"
        authvarlname="{{auth()->user()->last_name}}"
        authvarphone="{{auth()->user()->phone}}"
        authvardob="{{auth()->user()->dob}}"
        authvaremail="{{auth()->user()->email}}"
        authvarkname="{{auth()->user()->kname}}"
        authvarklname="{{auth()->user()->klast_name}}"
        authvarkemail="{{auth()->user()->kemail}}"
        authvarkphone="{{auth()->user()->kphone}}"
        authvarkrelation="{{auth()->user()->krelation}}"
        authvarcity="{{auth()->user()->city}}"
        authvarstreet="{{auth()->user()->street}}"
        authvarunit="{{auth()->user()->unit}}"
        authvarzip="{{auth()->user()->zip}}"
        authvarinfo="{{auth()->user()->delivery_info}}"
        authvarseccity="{{auth()->user()->sec_city}}"
        authvarsecstreet="{{auth()->user()->sec_street}}"
        authvarsecunit="{{auth()->user()->sec_unit}}"
        authvarseczip="{{auth()->user()->sec_zip}}"
        authvarsecinfo="{{auth()->user()->sec_delivery_info}}"
        authvarseccheck="{{auth()->user()->sec_address_check}}"
        authvarcustomerStripe="{{auth()->user()->stripe_id}}"
        lastfour="{{auth()->user()->card_last_four}}"
        brand="{{auth()->user()->card_brand}}"
        expdate="{{auth()->user()->trial_ends_at}}"

        procheck1="{{auth()->user()->profile_check_1}}"
        procheck2="{{auth()->user()->profile_check_2}}"
        procheck3="{{auth()->user()->profile_check_3}}"

        authvarpic1="{{auth()->user()->profile_pic}}"
        authvarpic2="{{auth()->user()->license_front}}"
        authvarpic3="{{auth()->user()->license_back}}"
        authvarpic4="{{auth()->user()->photo_id}}"
        checkinrole="{{auth()->user()->role}}"
        cnameauth="{{auth()->user()->cname}}"
        abnauth="{{auth()->user()->abn}}"
        titleauth="{{auth()->user()->title}}"
        ></profile>



</div>
<script type="text/javascript">
$(document).ready(function(){
    console.log('page loaded');
    $(".openDash1").removeClass("active");


});


</script>
@endsection
