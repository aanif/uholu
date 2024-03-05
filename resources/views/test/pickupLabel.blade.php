


<head>
    <style>
        body{
            font-family: Helvetica;
        }
        .container1{
            width: 595px;
            height: 842px;
        }
        .pickup_id{
            /* width: 124px; */
            /* height: 14px; */
            font-family: Helvetica;
            font-style: normal;
            font-weight: normal;
            font-size: 12px;
            line-height: 14px;
            text-transform: uppercase;
            color: #000000;
            margin-left: 17px;
        }
        .name{
            width: 110px;
            height: 28px;
            font-style: normal;
            font-weight: bold;
            font-size: 24px;
            color: #000000;
        }
        .customer_id{
            /* width: 182px; */
            /* height: 21px; */
            font-style: normal;
            font-weight: normal;
            font-size: 18px;
            color: #8D8D8D;
        }
        .key_id{
            /* width: 46px; */
            /* height: 16px; */
            font-style: normal;
            font-weight: 300;
            font-size: 14px;
            color: #3C3C3C;
        }
        .key_name{
            /* width: 72px; */
            /* height: 16px; */
            font-style: normal;
            font-weight: 300;
            font-size: 14px;
            color: #3C3C3C;
        }
        .info{
            /* width: 314px; */
            /* height: 38px; */
            font-style: normal;
            font-weight: 300;
            font-size: 12px;
            line-height: 14px;
            color: #707070;
        }
    </style>
</head>


<body>
@foreach($items as $key=>$item)
<div style="width:900px;height:450px;padding:20px">
    <div style="width:900px;height:50px;padding:20px">
        <table style="width:1050px">
            <tr style="width:100%">
                <td style="width:80%">
                    <img width="90px" src="http://uholu.com/assets-m/img/brand/uholulogo.png" alt="logo" >
                </td>
                <td style="width:100%">
                   <span class="pickup_id">PICKUP ID: pick{{$pickup->id}}</span>
                </td>
            </tr>
        </table>

    </div>
    <table style="width:100%">
        <tr>
            <td>
            <div style="padding-left:20px">
               <span class="name">{{$user->name}}</span><br><br>
                @if($user->role=='customer')
                <span class="customer_id">Customer ID: #1003{{$user->id}}</span>
                @endif
                @if($user->role=='business')
                <span class="customer_id">Customer ID: #2003{{$user->id}}</span>
                @endif
                <br><br><br><br>


                @if($item->item_type=='Key')
                <span class="key_id"> Key ID: #key{{$item->assigned_id}}</span><br><br>

                <span class="key_name">Key Name: {{$item->name}}</span><br><br><br>
                @endif

                @if($item->item_type=='Doc')
                <span class="key_id"> Doc ID: #doc{{$item->assigned_id}}</span><br><br>

                <span class="key_name">  Doc Name: {{$item->name}}</span><br><br><br>
                @endif


                <span class="info">Description: {{$item->type}}</span><br><br>

            </div>
            </td>
            <td style="vertical-align:top;padding-top:20px">
                <center>
                    <div style="height:20px">
                        <?php echo $qr;?>
                    </div>
                </center>

            </td>
        </tr>

    </table>


</div>



@if($key%2)
    <div style="page-break-after: always;"></div>
@endif
@if(!($key%2))
        <img width="700px" src="http://uholu.com/assets-m/img/brand/lincut.png" alt="logo">
@endif

@endforeach

</body>
