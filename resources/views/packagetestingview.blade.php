@extends('main-layout')

@section('content')



<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>




$.ajax({
    method: 'GET',
    url: '/api/plans',
    'dataType' : 'json',
    //data: {'id' : id}, // a JSON object to send back
    success: function(response){
        for(var i=0;i<2;i++)
        {   console.log('packages for '+response.data[i].nickname)
              for(var j=0;j<=2;j++)
            {var count=j+1
            console.log('package '+count)
            console.log(response.data[i].tiers[j].flat_amount);}}
    },
    error: function() {
        console.log('error');

    }
});


</script>


@endsection
