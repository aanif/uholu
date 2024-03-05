@extends('dash-layout')

@section('content')
<script src="https://js.stripe.com/v3/"></script>
<div id="app" style="width:100%;height:80%">

<changepass
user_id="{{auth()->user()->id}}"
email="{{auth()->user()->email}}"
></changepass>

</div>
@endsection
