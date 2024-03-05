
@extends('pinlayout')

@section('content')
<div style="width:100%;height:500px;">
<center><div style="background-color:#DCDCDC;width:30% ">
    <form style="margin-top:200px;border:1px solid #C8C8C8"><br>
  <span>
      <h3>Enter Pin</h3>
    <input  onkeypress="return /\d/.test(String.fromCharCode(((event||window.event).which||(event||window.event).which)));" type="text" name="myinput" id="myinput0" maxlength="1" size="2" style="font-size:15px;height:40px;text-align:center;border: 0.1px solid #C8C8C8;"/>
    <input  onkeypress="return /\d/.test(String.fromCharCode(((event||window.event).which||(event||window.event).which)));" type="text" name="myinput" id="myinput1" maxlength="1" size="2" style="font-size:15px;height:40px;text-align:center;border: 0.1px solid #C8C8C8;"/>
    <input  onkeypress="return /\d/.test(String.fromCharCode(((event||window.event).which||(event||window.event).which)));" type="text" name="myinput" id="myinput2" maxlength="1" size="2" style="font-size:15px;height:40px;text-align:center;border: 0.1px solid #C8C8C8;"/>
    <input  onkeypress="return /\d/.test(String.fromCharCode(((event||window.event).which||(event||window.event).which)));" type="text" name="myinput" id="myinput3" maxlength="1" size="2" style="font-size:15px;height:40px;text-align:center;border: 0.1px solid #C8C8C8;"/>
    <input  onkeypress="return /\d/.test(String.fromCharCode(((event||window.event).which||(event||window.event).which)));" type="text" name="myinput" id="myinput4" maxlength="1" size="2" style="font-size:15px;height:40px;text-align:center;border: 0.1px solid #C8C8C8;"/>
    <input  onkeypress="return /\d/.test(String.fromCharCode(((event||window.event).which||(event||window.event).which)));" type="text" name="myinput" id="myinput5" maxlength="1" size="2" style="font-size:15px;height:40px;text-align:center;border: 0.1px solid #C8C8C8;"/>
  </span><br><br>
<button type="button" style="background-color:#337AB7;border: none;border-radius: 3px;color:white;height:35px;width:80px;font-family:Helvetica" id="but">Verify</button><br><br>
</form></div>
</center>
</div>


<script>
    jQuery(document).ready(function () {


        // $( "#myinput0" ).on('keydown keyup change',function() {
        //     if(e.keyCode == 8){

        //     }
        //     else{
        //     var curi=$(this).val().length;
        //     if(curi>0)
        //     {
        //         $('#myinput1').focus();
        //     }}
        // });


        $( "#myinput0" ).keyup(function(e) {
            console.log('it ran')
            if(e.keyCode == 8){

            }
            else{
            var curi=$(this).val().length;
            if(curi>0)
            {
                $('#myinput1').focus();
            }}
        });

        $( "#myinput1" ).keyup(function(e) {
            if(e.keyCode == 8){

            }
            else{
                var curi=$(this).val().length;
            if(curi>0)
            {
                $('#myinput2').focus();
            }}
        });

        $( "#myinput2" ).keyup(function(e) {
            if(e.keyCode == 8){

            }
            else{
                var curi=$(this).val().length;
            if(curi>0)
            {
                $('#myinput3').focus();
            }}
        });

        $( "#myinput3" ).keyup(function(e) {
            if(e.keyCode == 8){

            }
            else{
                var curi=$(this).val().length;
            if(curi>0)
            {
                $('#myinput4').focus();
            }}
        });

        $( "#myinput4" ).keyup(function(e) {
            if(e.keyCode == 8){

            }
            else{
                var curi=$(this).val().length;
            if(curi>0)
            {
                $('#myinput5').focus();
            }}
        });


        $('#but').click(function(){
            var a=$('#myinput0').val()
            var b=$('#myinput1').val()
            var c=$('#myinput2').val()
            var d=$('#myinput3').val()
            var e=$('#myinput4').val()
            var f=$('#myinput5').val()

            var value=a+b+c+d+e+f;
            console.log('value =',value);




        });
    });

    </script>
@endsection
