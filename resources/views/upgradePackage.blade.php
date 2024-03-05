@extends('dash-layout')

@section('content')
<script src="https://js.stripe.com/v3/"></script>
<div id="app" style="width:100%;height:80%">

<upgradepack
cust="{{auth()->user()->stripe_id}}"
userid="{{auth()->user()->id}}"
docid="{{auth()->user()->doc_id}}"
docquantity="{{auth()->user()->doc_quantity}}"
keyid="{{auth()->user()->key_id}}"
keyquantity="{{auth()->user()->key_quantity}}"
subidkey="{{auth()->user()->sub_id2}}"
subiddoc="{{auth()->user()->sub_id}}"
roleuser="{{auth()->user()->role}}"
user_name="{{auth()->user()->name}}"
useremail="{{auth()->user()->email}}"

></upgradepack>

</div>
@endsection
