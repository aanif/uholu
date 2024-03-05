<header class="header-global">
    <nav id="navbar-main" class="navbar navbar-main navbar-expand-lg navbar-transparent navbar-light headroom" style="z-index: 100;">
      <div class="container">
        <a class="navbar-brand mr-lg-5" href="{{ asset('/') }}">
          <img src="{{ asset('assets-m/img/brand/uholulogo.png')}}" alt="brand">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
          <span class="aa navbar-toggler-icon"></span>
        </button>
        <div class="aan navbar-collapse collapse" id="navbar_global">
          <div class="navbar-collapse-header">
            <div class="row">
              <div class="col-6 collapse-brand">
                <a href="../index.html">
                  <img src="{{ asset('assets-m/img/brand/uholulogo.png')}}" alt="brand">
                </a>
                {{-- <a href="{{ asset('/login') }}" class="btn btn-neutral btn-icon" style="float:right;right:-90%" data-toggle="dropdown" role="button"> --}}
                    <a href="{{ asset('/login') }}" style="border-radius: 90px;background:white;color:black;padding-top:7px;padding-bottom:7px;padding-left:35px;padding-right:35px;font-size:13px;border:1px solid black;float:right">Log In</a>

                    {{-- <span class="nav-link-inner--text">Login</span> --}}
                  {{-- </a> --}}
              </div>
              <div class="col-6 collapse-close">
                <button type="button" class="aani navbar-toggler" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                    <span></span>
                    <span></span>
                  </button>
              </div>
            </div>
          </div>
          <ul class="navbar-nav navbar-nav-hover align-items-lg-center">
            {{-- <li class="nav-item dropdown">
              <a href="{{ asset('/') }}" class="nav-link" data-toggle="dropdown" role="button">
                <i class="ni ni-collection d-lg-none"></i>
                <span class="nav-link-inner--text">Home</span>
              </a> --}}

              {{-- <div class="dropdown-menu dropdown-menu-xl">
                <div class="dropdown-menu-inner">
                  <a href="https://demos.creative-tim.com/argon-design-system/docs/getting-started/overview.html" class="media d-flex align-items-center">
                    <div class="icon icon-shape bg-gradient-primary rounded-circle text-white">
                      <i class="ni ni-spaceship"></i>
                    </div>
                    <div class="media-body ml-3">
                      <h6 class="heading text-primary mb-md-1">Getting started</h6>
                      <p class="description d-none d-md-inline-block mb-0">Learn how to use Argon compiling Scss, change brand colors and more.</p>
                    </div>
                  </a>
                  <a href="https://demos.creative-tim.com/argon-design-system/docs/foundation/colors.html" class="media d-flex align-items-center">
                    <div class="icon icon-shape bg-gradient-success rounded-circle text-white">
                      <i class="ni ni-palette"></i>
                    </div>
                    <div class="media-body ml-3">
                      <h6 class="heading text-primary mb-md-1">Foundation</h6>
                      <p class="description d-none d-md-inline-block mb-0">Learn more about colors, typography, icons and the grid system we used for Argon.</p>
                    </div>
                  </a>
                  <a href="https://demos.creative-tim.com/argon-design-system/docs/components/alerts.html" class="media d-flex align-items-center">
                    <div class="icon icon-shape bg-gradient-warning rounded-circle text-white">
                      <i class="ni ni-ui-04"></i>
                    </div>
                    <div class="media-body ml-3">
                      <h5 class="heading text-warning mb-md-1">Components</h5>
                      <p class="description d-none d-md-inline-block mb-0">Browse our 50 beautiful handcrafted components offered in the Free version.</p>
                    </div>
                  </a>
                </div>
              </div> --}}
            {{-- </li> --}}
            {{--<li class="nav-item dropdown">
                <a href="{{ asset('/login') }}" class="nav-link" data-toggle="dropdown" role="button">
                  <i class="ni ni-collection d-lg-none"></i>
                  <span class="nav-link-inner--text">Login</span>
                </a>
                 <div class="dropdown-menu">
                  <a href="../examples/landing.html" class="dropdown-item">Landing</a>
                  <a href="../examples/profile.html" class="dropdown-item">Profile</a>
                  <a href="../examples/login.html" class="dropdown-item">Login</a>
                  <a href="../examples/register.html" class="dropdown-item">Register</a>
                </div>
              </li> --}}
              <li class="nav-item dropdown">
                <a href=".#serv" class="nav-link" >

                  <span class="nav-link-inner--text">Services</span>
                </a>
              </li>
            <li class="nav-item dropdown">
              <a href=".#how" class="nav-link" >

                <span class="nav-link-inner--text">How it works?</span>
              </a>
            </li>
            <li class="nav-item dropdown">
                <a href=".#personal" class="nav-link" >

                  <span class="nav-link-inner--text">Personal Packages</span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a href=".#bussiness" class="nav-link" >

                  <span class="nav-link-inner--text">Business Packages</span>
                </a>
            </li>

          </ul>
          <ul class="navbar-nav align-items-lg-center ml-lg-auto">
            <li class="nav-item">
              <a class="nav-link nav-link-icon" href="#!" data-toggle="tooltip" title="Like us on Facebook">
                <i class="fa fa-facebook-square"></i>
                <span class="nav-link-inner--text d-lg-none">Facebook</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-link-icon" href="#!" data-toggle="tooltip" title="Follow us on Instagram">
                <i class="fa fa-instagram"></i>
                <span class="nav-link-inner--text d-lg-none">Instagram</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-link-icon" href="#!" data-toggle="tooltip" title="Follow us on Twitter">
                <i class="fa fa-twitter-square"></i>
                <span class="nav-link-inner--text d-lg-none">Twitter</span>
              </a>
            </li>
            {{-- <li class="nav-item">
              <a class="nav-link nav-link-icon" href="#!" data-toggle="tooltip" title="Star us on Github">
                <i class="fa fa-github"></i>
                <span class="nav-link-inner--text d-lg-none">Github</span>
              </a>
            </li> --}}
            {{-- <li class="nav-item d-none d-lg-block ml-lg-2">
              <a href="{{route('register')}}" class="btn btn-neutral btn-icon">
                <span class="btn-inner--icon">
                  <i class="fa fa-user-plus mr-2"style="font-size:15px;"></i>
                </span>
                <span class="nav-link-inner--text">Sign up</span>
              </a>
            </li> --}}
        @if (Auth::guest())
            <li class="nav-item d-none d-lg-block ml-lg-2">
              {{-- <a href="{{ route('login') }}" class="btn btn-neutral btn-icon"> --}}
                <a href="{{ asset('/login') }}" style="border-radius: 90px;background:white;color:black;padding-top:7px;padding-bottom:7px;padding-left:25px;padding-right:25px;font-size:13px;border:1px solid black">LOG IN</a>

                {{-- <span class="btn-inner--icon">
                  <i class="fa fa-sign-in mr-2" style="font-size:15px;"></i>
                </span>
                <span class="nav-link-inner--text">Log In</span> --}}
              </a>
            </li>
            <!--<li class="nav-item d-none d-lg-block ml-lg-2">
                {{-- <a href="{{ route('login') }}" class="btn btn-neutral btn-icon"> --}}
                  <a href="{{ asset('/packages?noti=package') }}" style="border-radius: 90px;background:white;color:black;padding-top:7px;padding-bottom:7px;padding-left:25px;padding-right:25px;font-size:13px;border:1px solid black">REGISTER</a>

                  {{-- <span class="btn-inner--icon">
                    <i class="fa fa-sign-in mr-2" style="font-size:15px;"></i>
                  </span>
                  <span class="nav-link-inner--text">Log In</span> --}}
                </a>
              </li>-->

        @endif

        @if (Auth::check())
            <li class="nav-item d-none d-lg-block ml-lg-2">

                <a href="{{ route('dashboard') }}" style="border-radius: 90px;background:white;color:black;padding-top:7px;padding-bottom:7px;padding-left:35px;padding-right:35px;font-size:13px;border:1px solid black">Dashboard</a>
                {{-- <a href="{{ route('dashboard') }}" class="btn btn-neutral btn-icon"> --}}
                {{-- <span class="btn-inner--icon">
                    <i class="fa fa-sign-in mr-2" style="font-size:15px;"></i>
                </span>
                <span class="nav-link-inner--text">Dashboard</span> --}}
                </a>
            </li>
        @endif


          </ul>
        </div>
      </div>
    </nav>
  </header>
  <script>
jQuery(document).ready(function () {
    $(".aani").click(function(){
        $(".aan").css("display", "none");
    });

    $(".aa").click(function(){
        $(".aan").css("display", "");
    });


    $("a").on('click', function(event) {

// Make sure this.hash has a value before overriding default behavior
if (this.hash !== "") {
    console.log('hash: '+this.hash)
  // Prevent default anchor click behavior
//   event.preventDefault();

  // Store hash
  var hash = this.hash;

  // Using jQuery's animate() method to add smooth page scroll
  // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
  $('html, body').animate({
    scrollTop: $(hash).offset().top
  }, 800, function(){

    // Add hash (#) to URL when done scrolling (default click behavior)
    window.location.hash = hash;
  });
} // End if
});


});
      </script>
