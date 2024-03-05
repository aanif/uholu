@extends('main-layout')

@section('content')
<br>

<div style="width:100%;position:fixed;">
<div style="height:400px;
            width:350px;

            margin-top:150px;
            border:1px solid black;
            float:right;
            overflow: auto;
           ">
            <div class="docCO" style="width:90%;height:25%;border:1px solid black;margin:auto;margin-top:1em;display:none"></div>
            <div class="keyCO" style="width:90%;height:25%;border:1px solid black;margin:auto;margin-top:1em;display:none"></div>





        </div>

</div>
<example-component></example-component>

        <div style="padding-left:3em">
<div style="margin-top: 200px;">
    <div>

            <div class="doc1" style="width:50%;height:100px;border:1px solid black">doc1</div><br>
            {{-- <div class="doc2" style="width:50%;height:100px;border:1px solid black">doc2</div><br>
            <div class="doc3" style="width:50%;height:100px;border:1px solid black">doc3</div><br> --}}
    </div>
<br><br>
    <div>
             <div class="key1" style="width:50%;height:100px;border:1px solid black">key1</div><br>
             <div class="key2" style="width:50%;height:100px;border:1px solid black">key2</div><br>
             <div class="key3" style="width:50%;height:100px;border:1px solid black">key3</div><br>
             <div class="key4" style="width:50%;height:100px;border:1px solid black">key4</div><br>
             <div class="key5" style="width:50%;height:100px;border:1px solid black">key5</div><br>
    </div>
</div>
        </div>

    <script>
// jQuery(document).ready(function () {












// });










        </script>

@endsection
