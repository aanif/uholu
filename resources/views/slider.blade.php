@extends('main-layout')

@section('content')
<div class="position-relative" id="topdiv">
      <!-- shape Hero -->
      {{-- <section class="section section-lg section-shaped pb-250">
        <div class="shape shape-style-1 shape-default" style="margin-top:80px">

        </div>
        <div class="container py-lg-md d-flex">
          <div class="col px-0" style="margin-top:200px">
            <div class="row">
              <div class="col-lg-6" style="margin:auto">
                <center><h4 class="display-3  text-black" style="color:black"><b>Welcome to Uholu</b> </h4><br><h5 style="color:black"></h5><h6 style="color:black">Uholu is Australia’s 1st Online Safe Custody, Document and Spare Keys Storage and Management Service with an easy to manage App.</h6></center>
                <p class="lead  text-white"></p>
                @if (Auth::guest())
                <center><div class="btn-wrapper">
                  <br>
                  <a href="{{ asset('/packages') }}" style="border-radius: 90px;background:black;color:white;padding-top:15px;padding-bottom:15px;padding-left:35px;padding-right:35px;font-size:13px">GET STARTED</a>
                </div></center>
                @endif
              </div>
            </div>
          </div>
        </div>
      </section> --}}




      <!-- 1st Hero Variation -->
    </div>


    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <br><br><br><br>
        <div class="carousel-inner"  style="background-image: url('assets-m/css/banner.png');;height:90vh; background-size: cover;">

          <div class="carousel-item active" style="background-image: url('assets-m/css/banner.png');;height:90vh">
            <div class="container py-lg-md d-flex">
                <div class="col px-0" style="margin-top:20vh">
                  <div class="row">
                    <div class="col-lg-6" style="margin:auto">
                      <center><h4 class="display-3  text-black" style="color:black"><b>Welcome to Uholu</b> </h4><br><h5 style="color:black"></h5><h6 style="color:black">Uholu is Australia’s 1st Online Safe Custody, Document and Spare Keys Storage and Management Service with an easy to manage App.</h6></center>
                      <p class="lead  text-white"></p>
                      @if (Auth::guest())
                      <center><div class="btn-wrapper">
                        <br>
                        <a href="{{ asset('/packages') }}" style="border-radius: 90px;background:black;color:white;padding-top:15px;padding-bottom:15px;padding-left:35px;padding-right:35px;font-size:13px">GET STARTED</a>
                      </div></center>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
          </div>
          <div class="carousel-item" style="background-image: url('assets-m/css/banner2.jpeg'); background-repeat: no-repeat;height:90vh; background-size: cover;">
            <div style="width:100%;height:100%;background-color:#FCD206;opacity:0.3;position:absolute">
            </div>
            <div class="container py-lg-md d-flex">
                <div class="col px-0" style="margin-top:20vh">
                  <div class="row">
                    <div class="col-lg-6" style="margin:auto">
                      <center><h4 class="display-3  text-black" style="color:black"><b>Welcome to Uholu</b> </h4><br><h5 style="color:black"></h5><h6 style="color:black">Uholu is Australia’s 1st Online Safe Custody, Document and Spare Keys Storage and Management Service with an easy to manage App.</h6></center>
                      <p class="lead  text-white"></p>
                      @if (Auth::guest())
                      <center><div class="btn-wrapper">
                        <br>
                        <a href="{{ asset('/packages') }}" style="border-radius: 90px;background:black;color:white;padding-top:15px;padding-bottom:15px;padding-left:35px;padding-right:35px;font-size:13px">GET STARTED</a>
                      </div></center>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
          </div>
          <div class="carousel-item" style="background-image: url('assets-m/css/banner3.jpg');;height:90vh; background-size: cover;">
            <div style="width:100%;height:100%;background-color:#FCD206;opacity:0.3;position:absolute">
            </div>
            <div class="container py-lg-md d-flex">
                <div class="col px-0" style="margin-top:20vh">
                  <div class="row">
                    <div class="col-lg-6" style="margin:auto">
                      <center><h4 class="display-3  text-black" style="color:white"><b>Welcome to Uholu</b> </h4><br><h5 style="color:white"></h5><h6 style="color:white">Uholu is Australia’s 1st Online Safe Custody, Document and Spare Keys Storage and Management Service with an easy to manage App.</h6></center>
                      <p class="lead  text-white"></p>
                      @if (Auth::guest())
                      <center><div class="btn-wrapper">
                        <br>
                        <a href="{{ asset('/packages') }}" style="border-radius: 90px;background:black;color:white;padding-top:15px;padding-bottom:15px;padding-left:35px;padding-right:35px;font-size:13px">GET STARTED</a>
                      </div></center>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

    <br><br>
    <br> <br><br>
    <br> <br><br>
    <br>
    <div id="serv">
    <br><br>



    <section class="section section-lg" >
        <div class="container">
            <h3 style="margin-left:45px">Storage Types</h3>

          <div class="row row-grid align-items-center">

            <div class="col-md-4 order-md-1">
                <div class="pr-md-5">
                  <ul class="list-unstyled mt-5">
                    <li class="py-2">
                      <div class="d-flex align-items-center">

                        <div>
                            <img src="{{ asset('assets-m/css/keys.png')}}" style="width:70px;margin-left:45px;margin-bottom:20px">

                          <h6 class="mb-0" style="margin-left:45px"><b>Key Storage</b></h6>
                        </div>
                      </div>
                      <p style="margin-left:47px;font-size:13px">Business and Personal Keys stored and secured with Uholu. We provide 24/7 - 365 days service to store and manage Spare Keys and deliver when you need it and where you need it. You can nominate to be delivered to anyone you authorise. This include emergency services in case of any unforeseen circumstances. All keys can be managed on our app and replaced anytime. We deliver Home and Business Key within 45 to 90 Minutes within the metro.</p>
                    </li>
                  </ul>
                </div>
              </div>

            <div class="col-md-4 order-md-1">
              <div class="pr-md-5">
                <ul class="list-unstyled mt-5">
                  <li class="py-2">
                    <div class="d-flex align-items-center">
                      </div>
                      <div style="margin-top:-40px">
                          <img src="{{ asset('assets-m/css/files.png')}}" style="width:70px;margin-left:45px;margin-bottom:20px">
                        <h6 class="mb-0" style="margin-left:45px"><b>Personal Storage/Safe Custody*</b></h6>
                      </div>
                    </div>
                    <p style="margin-top: -20px;margin-left:47px;font-size:13px">Uholu is making it easy to securely store and manage Original Documents like Wills, Trust, Birth Certificates, Citizenship Certificates, Qualification Transcripts, and Passports, etc. We secure them in our Storage Facilities while you manage it with a Simple and easy to use App. You documents Secured and on your finger tios delivered when & where you need it. <br>*T&C's Apply</p>
                  </li>

                </ul>
              </div>
              <div class="col-md-4 order-md-1" style="margin-top: -50px;">
                <div class="pr-md-5">
                  <ul class="list-unstyled mt-5">
                    <li class="py-2">
                      <div class="d-flex align-items-center">
                        <div>
                        </div>
                        <div>
                            <img src="{{ asset('assets-m/css/Group 57.svg')}}" style="width:90px;margin-left:45px;margin-bottom:20px">
                          <h6 class="mb-0" style="margin-left:45px"><b>Business Document Storage</b></h6>
                        </div>
                      </div>
                      <p style="margin-left:47px;font-size:13px">Business Document Storage like no other with easy to use Dashboard. User accounts, Cloud Storage, Admin Facility, 24/7 Support, Normal and Urgent Delivery options. Scanning and Shredding Service all in one place. Plus Authorise anyone to receive documents. We Have Made it easy with one simple subscription cost.</p>
                    </li>

                  </ul>
                </div>
              </div>
            </div>



            </div>
          </div>
        </div>
      </section>
    </div>
      <br><br>
      <br><br>
      <br> <br><br>
      <br>
      <br><br>
      <br>

<div style="padding:10vh;width:100%;height:70vh;background-color:#FCD206">
    <div style="widht:100%;height:100%;border:1px solid #FCD206">
      {{-- <div style="display:flex;justify-content:center;align-items:center;"> --}}
          <div style="height:15vh"><h4 style="color:black"><b>How The Process Works</b></h4></div>
        <table>
            <tr>
                <td style="padding:10px;width:25%;vertical-align:top">
                    <span style="color:black;"><b>Choose Package</b></span><br><br>
                    <p style="color:black;font-size:13px">Select a package from list of awesome packages, find one that fit's your needs.</p>
                </td>

                <td style="padding:10px;width:25%;vertical-align:top">
                    <span style="color:black;"><b>Tell Us About Yourself</b></span><br><br>
                    <p style="color:black;font-size:13px">Fill out Critical Info, you can skip it for later, verify your identity and you are almost set.</p>
                </td>
                <td style="padding:10px;width:25%;vertical-align:top">
                    <span style="color:black;"><b>Start Subscription</b></span><br><br>
                    <p style="color:black;font-size:13px">Set payment method, and we will start your subscription, Payment will be deducted automatically. You can always cancel your membership</p>
                </td>

                <td style="padding:10px;width:25%;vertical-align:top">
                    <span style="color:black;"><b>Add Keys/Docs</b></span><br><br>
                    <p style="color:black;font-size:13px">Start adding keys and documents, You can request pickup and Uholu guys will pick it up from your door.</p>
                </td>
            </tr>
        </table>
    </div>
{{-- </div> --}}
</div>


      {{-- <section class="section section-lg bg-gradient-default">
        <div class=" pt-lg pb-300" id="how" style="padding-top:0rem !important;padding-bottom:0px !important">
          <div class="row text-center justify-content-center">
          </div>
          <div class="row row-grid mt-5"  style="margin-top:0px !important;margin-bottom:0px !important;width:100%">
            <div class="col-lg-6" style="display:flex;justify-content:center;align-items:center;">
                <div style="padding-left:100px;padding-right:50px;padding-top:20px;width:100%">
                    <h4 style="color:white;margin-left:10px">How to get it done?</h4><br>
                    <table>
                        <tr>
                            <td style="padding:10px">
                                <span style="color:#FCD206;"><b>01<br>Select Package</b></span><br><br>
                                <p style="color:white;font-size:13px">Select a package from list of awesome packages, find one that fit's your needs.</p>
                            </td>


                            <td style="padding:10px">
                                <span style="color:#FCD206;"><b>02<br>Verify Yourself</b></span><br><br>
                                <p style="color:white;font-size:13px">Fill out Critical Info, you can skip it for later, verify your identity and you are almost set.</p>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:10px">
                                <span style="color:#FCD206;"><b>03<br>Set Payment</b></span><br><br>
                                <p style="color:white;font-size:13px">Set payment method, and we will start your subscription, amount will be deducted automatically.</p>
                            </td>

                            <td style="padding:10px">
                                <span style="color:#FCD206;"><b>04<br>Add Keys & Docs</b></span><br><br>
                                <p style="color:white;font-size:13px">At this point you are all set just start adding your keys and docs then you can request pickup.</p>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-lg-6">
                <img src="{{ asset('assets-m/css/cupboard.png')}}" style="width:104.7%;">
            </div>
          </div>
        </div>
        <!-- SVG separator -->
        <div class="separator separator-bottom separator-skew zindex-100">
        </div>
      </section> --}}



<br><br>
<br>
<br><br>
<br>
<br><br>
<br><br><br><!---->
<br>
    <section class="section section-lg pt-lg-0 mt--200" id="personal">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="row text-center justify-content-center">
                    <div class="col-lg-10">
                      <h2 class="display-3 text-black"><b>Personal</b></h2><br><br>
                    </div>

        <center>
            <div style="width:100%;padding-bottom:40px">
                 <table>
                     <tr>
                         <td><button type="button" class="l1 btn" style="color:white">Documents</button></td>
                         <td><button type="button" class="l2 btn" style="color:white;width:133px">Keys</button></td>
                     </tr>
                 </table>
            </div>
        </center>


                  </div>

            <div class="mainFrameOne">
              <div class="row row-grid">
                <div class="col-lg-4">
                  <div class="card card-lift--hover shadow border-0">
                    <div class="card-body py-5">
                     <center>
                     <br> <span>$<h1 class="text-primary text-uppercase b1" style="display:inline;color:#535074 !important;font-size:55px;font-size:55px">XX</h1><h6 class="text-primary text-uppercase" style="display:inline;color:#535074 !important">.00/Year</h6></span>
                      <p class="description mt-3">Basic Yearly Package</p>
                      <div>
                        <span class="">1 Kg Satchel</span><br>
                        <span class="">Tough Storage Bag</span><br>
                        <span class="">Peel & Seal Closure</span><br>
                        <span class="">236 x 329mm</span><br>
                        <span class="">Standard or Express Delivery</span><br>
                        <span class="">1 Free Standard Delivery</span><br>
                      </div>
                      <br><a href="{{ asset('/packages?type=personal') }}" style="border-radius: 90px;background:white;color:#6D7893;padding-top:7px;padding-bottom:7px;padding-left:35px;padding-right:35px;font-size:13px;border:1px solid #6D7893">Select Package</a></center>

                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="card card-lift--hover shadow border-0">
                    <div class="card-body py-5">
                      <center>
                      <br> <span>$<h1 class="text-success text-uppercase b2" style="display:inline;color:#535074 !important;font-size:55px">XX</h1><h6 class="text-success text-uppercase" style="display:inline;color:#535074 !important">.00/Year</h6></span>
                      <p class="description mt-3">Standard Yearly Package</p>
                      <div>
                        <span class="">3 Kg Satchel</span><br>
                        <span class="">Tough Storage Bag</span><br>
                        <span class="">Peel & Seal Closure</span><br>
                        <span class="">261 x 369mm</span><br>
                        <span class="">Standard or Express Delivery</span><br>
                        <span class="">1 Free Standard Delivery</span><br>
                      </div>
                      <br><a href="{{ asset('/packages?type=personal') }}" style="border-radius: 90px;background:white;color:#6D7893;padding-top:7px;padding-bottom:7px;padding-left:35px;padding-right:35px;font-size:13px;border:1px solid #6D7893">Select Package</a></center>

                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="card card-lift--hover shadow border-0">
                    <div class="card-body py-5">
                      <center>
                      <br> <span>$<h1 class="text-warning text-uppercase b3" style="display:inline;color:#535074 !important;font-size:55px">XX</h1><h6 class="text-warning text-uppercase" style="display:inline;color:#535074 !important">.00/Year</h6></span>
                      <p class="description mt-3">Pro Yearly Package</p>
                      <div>
                        <span class="">5 Kg Satchel</span><br>
                        <span class="">Tough Storage Bag</span><br>
                        <span class="">Peel & Seal Closure</span><br>
                        <span class="">299 x 429mm</span><br>
                        <span class="">Standard or Express Delivery</span><br>
                        <span class="">1 Free Standard Delivery</span><br>
                      </div>
                      <br><a href="{{ asset('/packages?type=personal') }}" style="border-radius: 90px;background:white;color:#6D7893;padding-top:7px;padding-bottom:7px;padding-left:35px;padding-right:35px;font-size:13px;border:1px solid #6D7893">Select Package</a></center>

                    </div>
                  </div>
                </div>
              </div>
            </div>



            <div class="mainFrameTwo" style="display: none">
              <div class="row row-grid">
                <div class="col-lg-4">
                  <div class="card card-lift--hover shadow border-0">
                    <div class="card-body py-5">
                      <center>
                      <br> <span>$<h1 class="text-primary text-uppercase b4" style="display:inline;color:#535074 !important;font-size:55px">XX</h1><h6 class="text-primary text-uppercase" style="display:inline;color:#535074 !important">.00/Year</h6></span>
                      <p class="description mt-3">Basic Yearly Package</p>
                      <div>
                        <span class="">Up to 2 Spare Key Storage</span><br>
                        <span class="">90 Min Emergency Delivery</span><br>
                        <span class="">1 Free Delivery</span><br>
                        <span class="">24/7 Priority Delivery*</span><br>
                        <span class="">My Account App</span><br>
                        <span class="">Fully Insured</span><br>
                      </div>
                      <br><a href="{{ asset('/packages?type=personal') }}" style="border-radius: 90px;background:white;color:#6D7893;padding-top:7px;padding-bottom:7px;padding-left:35px;padding-right:35px;font-size:13px;border:1px solid #6D7893">Select Package</a></center>

                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="card card-lift--hover shadow border-0">
                    <div class="card-body py-5">
                      <center>
                      <br> <span>$<h1 class="text-success text-uppercase b5" style="display:inline;color:#535074 !important;font-size:55px">XX</h1><h6 class="text-success text-uppercase"style="display:inline;color:#535074 !important">.00/Year</h6></span>
                      <p class="description mt-3">Standard Yearly Package</p>
                      <div>
                        <span class="">Up to 4 Spare Key Storage</span><br>
                        <span class="">90 Min Emergency Delivery</span><br>
                        <span class="">1 Free Delivery</span><br>
                        <span class="">24/7 Priority Delivery*</span><br>
                        <span class="">My Account App</span><br>
                        <span class="">Fully Insured</span><br>
                      </div>
                      <br><a href="{{ asset('/packages?type=personal') }}" style="border-radius: 90px;background:white;color:#6D7893;padding-top:7px;padding-bottom:7px;padding-left:35px;padding-right:35px;font-size:13px;border:1px solid #6D7893">Select Package</a></center>

                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="card card-lift--hover shadow border-0">
                    <div class="card-body py-5">
                      <center>
                      <br> <span>$<h1 class="text-warning text-uppercase b6" style="display:inline;color:#535074 !important;font-size:55px">XX</h1><h6 class="text-warning text-uppercase" style="display:inline;color:#535074 !important">.00/Year</h6></span>
                      <p class="description mt-3">Pro Yearly Package</p>
                      <div>
                        <span class="">Up to 6 Spare Key Storage</span><br>
                        <span class="">90 Min Emergency Delivery</span><br>
                        <span class="">1 Free Delivery</span><br>
                        <span class="">24/7 Priority Delivery*</span><br>
                        <span class="">My Account App</span><br>
                        <span class="">Fully Insured</span><br>
                      </div>
                      <br><a href="{{ asset('/packages?type=personal') }}" style="border-radius: 90px;background:white;color:#6D7893;padding-top:7px;padding-bottom:7px;padding-left:35px;padding-right:35px;font-size:13px;border:1px solid #6D7893">Select Package</a></center>

                    </div>
                  </div>
                </div>
              </div>
            </div>
<br><br>
            <center>
                @if (Auth::guest())
                <a type="button" href="{{ asset('/packages?type=personal') }}" class="btn btn-primary"  style="border-color:#FCD206;background-color:#FCD206" width="100px" height="50px"><span style="color:black">Show All Packages</span></a>
                @endif
                @if (Auth::check())
                <a type="button" href="{{ asset('/dashboard/upgradePackage') }}" class="btn btn-primary" style="border-color:#FCD206;background-color:#FCD206" width="100px" height="50px"><span style="color:black">Upgrade Package</span></a>
                @endif
            </center>



        </div>
    </div>
  </div>
</section>
<!----------------------------------------------Bussiness Packages----------------------------------->
<br><br><br><br><br><br><br><br><br><br><br><br><br>



<section class="section section-lg pt-lg-0 mt--200" id="bussiness">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12">



            <div class="row text-center justify-content-center">
                <div class="col-lg-10">
                  <h2 class="display-3 text-black"><b>Business</b></h2><br><br>
                </div>

                <center>
                    <div style="width:100%;padding-bottom:40px">
                         <table>
                             <tr>
                                 <td><button type="button" class="l3 btn" style="color:white">Documents</button></td>
                                 <td><button type="button" class="l4 btn" style="color:white;width:133px">Keys</button></td>
                             </tr>
                         </table>
                    </div>
                </center>



            </div>




<div class="mainFrameThree">
    <div class="row row-grid">
      <div class="col-lg-4" style="margin-bottom:30px">
        <div class="card card-lift--hover shadow border-0">
          <div class="card-body py-5">
            <center>
           <br> <span>$<h1 class="text-primary text-uppercase b7" style="display:inline;color:#535074 !important;font-size:55px;font-size:55px">XX</h1><h6 class="text-primary text-uppercase" style="display:inline;color:#535074 !important">.00/Month</h6></span>
            <p class="description mt-3">Basic Monthly Package</p>
            <div>
              <span class="">5 Document Satchel</span><br>
              <span class="">Tough Storage Bag</span><br>
              <span class="">Peel & Seal Closure</span><br>
              <span class="">236 x 329mm</span><br>
              <span class="">Standard or Express Delivery</span><br>
              <span class="">1 Free Standard Pickup/Delivery</span><br>
            </div>
            <br><a href="{{ asset('/packages?type=business') }}" style="border-radius: 90px;background:white;color:#6D7893;padding-top:7px;padding-bottom:7px;padding-left:35px;padding-right:35px;font-size:13px;border:1px solid #6D7893">Select Package</a></center>

          </div>
        </div>
      </div>
      <div class="col-lg-4" style="margin-bottom:30px">
        <div class="card card-lift--hover shadow border-0">
          <div class="card-body py-5">
            <center>
            <br> <span>$<h1 class="text-success text-uppercase b8" style="display:inline;color:#535074 !important;font-size:55px">XX</h1><h6 class="text-success text-uppercase" style="display:inline;color:#535074 !important">.00/Month</h6></span>
            <p class="description mt-3">Standard Monthly Package</p>
            <div>
              <span class="">10 Document Satchel</span><br>
              <span class="">Tough Storage Bag</span><br>
              <span class="">Peel & Seal Closure</span><br>
              <span class="">261 x 369mm</span><br>
              <span class="">Standard or Express Delivery</span><br>
              <span class="">1 Free Standard Pickup/Delivery</span><br>
            </div>
            <br><a href="{{ asset('/packages?type=business') }}" style="border-radius: 90px;background:white;color:#6D7893;padding-top:7px;padding-bottom:7px;padding-left:35px;padding-right:35px;font-size:13px;border:1px solid #6D7893">Select Package</a></center>

          </div>
        </div>
      </div>
      <div class="col-lg-4" style="margin-bottom:30px">
        <div class="card card-lift--hover shadow border-0">
          <div class="card-body py-5">
            <center>
            <br> <span>$<h1 class="text-warning text-uppercase b9" style="display:inline;color:#535074 !important;font-size:55px">XX</h1><h6 class="text-warning text-uppercase" style="display:inline;color:#535074 !important">.00/Month</h6></span>
            <p class="description mt-3">Pro Monthly Package</p>
            <div>
              <span class="">20 Document Satchel</span><br>
              <span class="">Tough Storage Bag</span><br>
              <span class="">Peel & Seal Closure</span><br>
              <span class="">299 x 429mm</span><br>
              <span class="">Standard or Express Delivery</span><br>
              <span class="">1 Free Standard Pickup/Delivery</span><br>
            </div>
            <br><a href="{{ asset('/packages?type=business') }}" style="border-radius: 90px;background:white;color:#6D7893;padding-top:7px;padding-bottom:7px;padding-left:35px;padding-right:35px;font-size:13px;border:1px solid #6D7893">Select Package</a></center>

          </div>
        </div>
      </div>
    </div>
</div>
</div>
</div>
<div class="mainFrameThree">
<div class="row justify-content-center">
  <div class="col-lg-8">
    <div class="row row-grid">
      <div class="col-lg-6" style="margin-bottom:30px">
        <div class="card card-lift--hover shadow border-0">
          <div class="card-body py-5">
            <center>
            <br> <span>$<h1 class="text-warning text-uppercase b10" style="display:inline;color:#535074 !important;font-size:55px">XX</h1><h6 class="text-warning text-uppercase" style="display:inline;color:#535074 !important">.00/Month</h6></span>
            <p class="description mt-3">Premium Monthly Package</p>
            <div>
              <span class="">50 Document Satchel</span><br>
              <span class="">Tough Storage Bag</span><br>
              <span class="">Peel & Seal Closure</span><br>
              <span class="">299 x 429mm</span><br>
              <span class="">Standard or Express Delivery</span><br>
              <span class="">1 Free Standard Pickup/Delivery</span><br>
            </div>
            <br><a href="{{ asset('/packages?type=business') }}" style="border-radius: 90px;background:white;color:#6D7893;padding-top:7px;padding-bottom:7px;padding-left:35px;padding-right:35px;font-size:13px;border:1px solid #6D7893">Select Package</a></center>

          </div>
        </div>
      </div>
      <div class="col-lg-6" style="margin-bottom:30px">
        <div class="card card-lift--hover shadow border-0">
          <div class="card-body py-5">
            <center>
            <br> <span>$<h1 class="text-warning text-uppercase b11" style="display:inline;color:#535074 !important;font-size:55px">XX</h1><h6 class="text-warning text-uppercase" style="display:inline;color:#535074 !important">.00/Month</h6></span>
            <p class="description mt-3">Gold Monthly Package</p>
            <div>
              <span class="">100 Document Satchel</span><br>
              <span class="">Tough Storage Bag</span><br>
              <span class="">Peel & Seal Closure</span><br>
              <span class="">299 x 429mm</span><br>
              <span class="">Standard or Express Delivery</span><br>
              <span class="">1 Free Standard Pickup/Delivery</span><br>
            </div>
            <br><a href="{{ asset('/packages?type=business') }}" style="border-radius: 90px;background:white;color:#6D7893;padding-top:7px;padding-bottom:7px;padding-left:35px;padding-right:35px;font-size:13px;border:1px solid #6D7893">Select Package</a></center>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<div class="mainFrameFour">
    <div class="row row-grid">
      <div class="col-lg-4" style="margin-bottom:30px">
        <div class="card card-lift--hover shadow border-0">
          <div class="card-body py-5">
           <center>
           <br> <span>$<h1 class="text-primary text-uppercase b12" style="display:inline;color:#535074 !important;font-size:55px;font-size:55px">XX</h1><h6 class="text-primary text-uppercase" style="display:inline;color:#535074 !important">.00/Month</h6></span>
            <p class="description mt-3">Basic Monthly Package</p>
            <div>
                <span class="">Up to 5 Spare Key Storage</span><br>
                <span class="">90 Min Emergency Delivery</span><br>
                <span class="">1 Free Delivery</span><br>
                <span class="">24/7 Priority Delivery*</span><br>
                <span class="">My Account App</span><br>
                <span class="">Fully Insured</span><br>
            </div>
            <br><a href="{{ asset('/packages?type=business') }}" style="border-radius: 90px;background:white;color:#6D7893;padding-top:7px;padding-bottom:7px;padding-left:35px;padding-right:35px;font-size:13px;border:1px solid #6D7893">Select Package</a></center>

          </div>
        </div>
      </div>
      <div class="col-lg-4" style="margin-bottom:30px">
        <div class="card card-lift--hover shadow border-0">
          <div class="card-body py-5">
            <center>
            <br> <span>$<h1 class="text-success text-uppercase b13" style="display:inline;color:#535074 !important;font-size:55px">XX</h1><h6 class="text-success text-uppercase" style="display:inline;color:#535074 !important">.00/Month</h6></span>
            <p class="description mt-3">Standard Monthly Package</p>
            <div>
                <span class="">Up to 10 Spare Key Storage</span><br>
                <span class="">90 Min Emergency Delivery</span><br>
                <span class="">1 Free Delivery</span><br>
                <span class="">24/7 Priority Delivery*</span><br>
                <span class="">My Account App</span><br>
                <span class="">Fully Insured</span><br>
            </div>
            <br><a href="{{ asset('/packages?type=business') }}" style="border-radius: 90px;background:white;color:#6D7893;padding-top:7px;padding-bottom:7px;padding-left:35px;padding-right:35px;font-size:13px;border:1px solid #6D7893">Select Package</a></center>

          </div>
        </div>
      </div>
      <div class="col-lg-4" style="margin-bottom:30px">
        <div class="card card-lift--hover shadow border-0">
          <div class="card-body py-5">
            <center>
            <br> <span>$<h1 class="text-warning text-uppercase b14" style="display:inline;color:#535074 !important;font-size:55px">XX</h1><h6 class="text-warning text-uppercase" style="display:inline;color:#535074 !important">.00/Month</h6></span>
            <p class="description mt-3">Pro Monthly Package</p>
            <div>
                <span class="">Up to 20 Spare Key Storage</span><br>
                <span class="">90 Min Emergency Delivery</span><br>
                <span class="">1 Free Delivery</span><br>
                <span class="">24/7 Priority Delivery*</span><br>
                <span class="">My Account App</span><br>
                <span class="">Fully Insured</span><br>
            </div>
            <br><a href="{{ asset('/packages?type=business') }}" style="border-radius: 90px;background:white;color:#6D7893;padding-top:7px;padding-bottom:7px;padding-left:35px;padding-right:35px;font-size:13px;border:1px solid #6D7893">Select Package</a></center>

          </div>
        </div>
      </div>
    </div>
</div>

<div class="mainFrameFour">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="row row-grid">
          <div class="col-lg-6" style="margin-bottom:30px">
            <div class="card card-lift--hover shadow border-0">
              <div class="card-body py-5">
                <center>
                <br> <span>$<h1 class="text-warning text-uppercase b15" style="display:inline;color:#535074 !important;font-size:55px">XX</h1><h6 class="text-warning text-uppercase" style="display:inline;color:#535074 !important">.00/Month</h6></span>
                <p class="description mt-3">Pro Monthly Package</p>
                <div>
                  <span class="">Up to 50 Spare Key Storage</span><br>
                  <span class="">Tough Storage Bag</span><br>
                  <span class="">Peel & Seal Closure</span><br>
                  <span class="">299 x 429mm</span><br>
                  <span class="">Standard or Express Delivery</span><br>
                  <span class="">1 Free Standard Pickup/Delivery</span><br>
                </div>
                <br><a href="{{ asset('/packages?type=business') }}" style="border-radius: 90px;background:white;color:#6D7893;padding-top:7px;padding-bottom:7px;padding-left:35px;padding-right:35px;font-size:13px;border:1px solid #6D7893">Select Package</a></center>

              </div>
            </div>
          </div>
          <div class="col-lg-6" style="margin-bottom:30px">
            <div class="card card-lift--hover shadow border-0">
              <div class="card-body py-5">
                <center>
                <br> <span>$<h1 class="text-warning text-uppercase b16" style="display:inline;color:#535074 !important;font-size:55px">XX</h1><h6 class="text-warning text-uppercase" style="display:inline;color:#535074 !important">.00/Month</h6></span>
                <p class="description mt-3">Pro Monthly Package</p>
                <div>
                  <span class="">Up to 100 Spare Key Storage</span><br>
                  <span class="">Tough Storage Bag</span><br>
                  <span class="">Peel & Seal Closure</span><br>
                  <span class="">299 x 429mm</span><br>
                  <span class="">Standard or Express Delivery</span><br>
                  <span class="">1 Free Standard Pickup/Delivery</span><br>
                </div>
                <br><a href="{{ asset('/packages?type=business') }}" style="border-radius: 90px;background:white;color:#6D7893;padding-top:7px;padding-bottom:7px;padding-left:35px;padding-right:35px;font-size:13px;border:1px solid #6D7893">Select Package</a></center>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>



            </div>
          </div>
        </div>
        <br><br>
  <center>
      @if (Auth::guest())
      <a type="button" href="{{ asset('/packages?type=business') }}" class="btn btn-primary"  style="border-color:#FCD206;background-color:#FCD206" width="100px" height="50px"><span style="color:black">Show All Packages</span></a>
      @endif
      @if (Auth::check())
      <a type="button" href="{{ asset('/dashboard/upgradePackage') }}" class="btn btn-primary" style="border-color:#FCD206;background-color:#FCD206" width="100px" height="50px"><span style="color:black">Upgrade Package</span></a>
      @endif
  </center>
      </section>

      <br><br><br>
      <br><br><br>

<script>


jQuery(document).ready(function () {

    var target = $(document.location.hash.replace("#","."));
          if (target.length) {
            $('html,body').animate({
              scrollTop: target.offset().top-50
            }, 1000);/*animate in 1sec, you may change this as you like*/
          }

    $.ajax({
        method: 'GET',
        url: '/api/planView',
        'dataType' : 'json',
        success: function(response){

             console.log(response);
            $('.b1').text(response[3].cost/100);
            $('.b2').text(response[4].cost/100);
            $('.b3').text(response[5].cost/100);
            $('.b4').text(response[0].cost/100);
            $('.b5').text(response[1].cost/100);
            $('.b6').text(response[2].cost/100);
            $('.b7').text(response[11].cost/100);
            $('.b8').text(response[12].cost/100);
            $('.b9').text(response[13].cost/100);
            $('.b10').text(response[14].cost/100);
            $('.b11').text(response[15].cost/100);
            $('.b12').text(response[6].cost/100);
            $('.b13').text(response[7].cost/100);
            $('.b14').text(response[8].cost/100);
            $('.b15').text(response[9].cost/100);
            $('.b16').text(response[10].cost/100);
        },
        error: function() {
            console.log('error');

        }
    });


    jQuery(".mainFrameTwo").hide();
    jQuery(".mainFrameFour").hide();
    jQuery(".l1").css("background", "#303030");
    jQuery(".l2").css("background", "#A0A0A0");
    jQuery(".l3").css("background", "#303030");
    jQuery(".l4").css("background", "#A0A0A0");

    $(".l1").click(function(){
        jQuery(".mainFrameTwo").hide();
        jQuery(".mainFrameOne").show();
        jQuery(".l1").css("background", "#303030");
        jQuery(".l2").css("background", "#A0A0A0");


    });

    $(".l2").click(function(){
        jQuery(".mainFrameOne").hide();
        jQuery(".mainFrameTwo").show();
        jQuery(".l1").css("background", "#A0A0A0");
        jQuery(".l2").css("background", "#303030");

    });



    $(".l3").click(function(){
        jQuery(".mainFrameFour").hide();
        jQuery(".mainFrameThree").show();
        jQuery(".l3").css("background", "#303030");
        jQuery(".l4").css("background", "#A0A0A0");


    });

    $(".l4").click(function(){
        jQuery(".mainFrameThree").hide();
        jQuery(".mainFrameFour").show();
        jQuery(".l3").css("background", "#A0A0A0");
        jQuery(".l4").css("background", "#303030");

    });
}
    );

</script>

@endsection
