<!DOCTYPE html>
<html lang="en">
  <head>
    @if(Auth::user()->role=='customer' || Auth::user()->role=='business' || Auth::user()->role== 'staff')
        @include('dash-partials.head')
    @endif
    @if(Auth::user()->role=='admin')
        @include('dashAdmin-partials.head')
    @endif


  </head>

  <body>
  <div class="wrapper">
      @if(Auth::user()->role=='customer' || Auth::user()->role=='business' || Auth::user()->role== 'staff')
            @include('dash-partials.dashboard')
     @endif
     @if(Auth::user()->role=='admin')
             @include('dashAdmin-partials.dashboard')
     @endif
<div class="main-panel">



    @if(Auth::user()->role=='customer' || Auth::user()->role=='business' || Auth::user()->role== 'staff')
            @include('dash-partials.navbar')
    @endif

    @if(Auth::user()->role=='admin')
            @include('dashAdmin-partials.navbar')
    @endif



  @yield('content')


  {{-- @include('dash-partials.footer') --}}
  </div>

	</div>
	@include('dash-partials.footer-script')

    <script src="/js/app.js"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  </body>
</html>
