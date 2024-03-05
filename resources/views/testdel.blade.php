
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
</head>

<body>


    <table align="center" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td align="left" valign="top" width="50%" style="background:repeat-x url(http://s3.amazonaws.com/swu-filepicker/4E687TRe69Ld95IDWyEg_bg_top_02.jpg) #ffffff;">
            <center>
            <img width="160" height="47" src="http://uholu.com/assets-m/img/brand/uholulogo.png" alt="logo">
            </center>
            </td>
        </tr>
    </table>
<br><br>
    <table style="width:95%">
        <tr >
            <td style="width:33%;padding:10px 10px 10px 10px">
                <div style="border:1px solid #e5e5e5;border-radius: 5px;margin-left:10px;margin-right:10px;width:90%;padding:40px 10px 20px 10px;height:200px">
                <span><b>Shipping Address:</b></span><br />
                                {{$data->name}}  <br />
                                <b>Apartment#</b> {{$data->unit}} <br><b>Street#</b> {{$data->street}} <br />
                                <b>City:</b> {{$data->city}} <br><b>Postal Code:</b> {{$data->zip}} <br />
                                Australia <br />
                                <b>Info:</b> {{$data->info}}
                </div>
            </td>
            <td style="width:33%;padding:10px 10px 10px 10px" >
                <div style="border:1px solid #e5e5e5;border-radius: 5px;margin-left:10px;margin-right:10px;width:90%;padding:40px 10px 20px 10px;height:200px">
                                <span ><b>Date/Time:</b></span><br />
                                {{$data->updated_at}} <br />
                                <br />
                                <span ><b>Order</b></span> <br />
                                deli{{$data->id}}
                </div>
            </td>
            <td style="width:33%;padding:10px 10px 10px 10px">
                <div style="border:1px solid #e5e5e5;border-radius: 5px;margin-left:10px;margin-right:10px;width:87%;padding:10px 10px 10px 10px;height:200px">
                    <center>
                        <div style="height:100px">

                        <?php echo $qr_code['qr'];?>
                        </div>
                    </center>
                </div>
            </td>
        </tr>
    </table>
    <br><br><br>
    <center>

    <table style="width:100%;border:1px solid #e5e5e5">
        <tr>
            <td width="33%">
                <b>Item ID</b>
             </td>
             <td width="33%">
                <b> Item Name</b>
              </td>
             <td width="33%">
                <b> Description</b>
             </td>
        </tr>
    </table>
    <br>
<table style="width:100%;border:1px solid #e5e5e5">
@if($getkey)
    @foreach ($getkey as $key)
        <tr>
            <td>



                key{{$key->assigned_id}}



        </td>
        <td >
          {{$key->name}}
        </td>
        <td >
            {{$key->type}}
          </td>
        </tr>
    @endforeach
@endif

@if($getdoc)
    @foreach ($getdoc as $doc)
        <tr>
            <td >


                doc{{$doc->assigned_id}}


        </td>
        <td >
            {{$doc->name}}
          </td>
          <td >
              {{$doc->type}}
            </td>
        </tr>
    @endforeach
@endif

    </table>
</center>

<br><br>
<center>

          <strong>Uholu International Pty Ltd</strong><br />
          Unit 7, 7-9 Westwood Drive<br />
          Ravenhall VIC 3023 <br /><br />

  </center>


</body>
</html>
