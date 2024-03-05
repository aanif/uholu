@extends('dash-layout')

@section('content')
<script src="https://js.stripe.com/v3/"></script>
<div id="app" style="width:100%;height:80%">

    <div class="requestPick" >

    <messages
                    user_id="{{auth()->user()->id}}"


                    ></messages>
    </div>

</div>
@endsection
