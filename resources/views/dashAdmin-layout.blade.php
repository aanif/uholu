<!DOCTYPE html>
<html lang="en">
  <head>
    @include('dashAdmin-partials.head')
  </head>

  <body>
  <div class="wrapper">
  @include('dashAdmin-partials.dashboard')
  <div class="main-panel">
  @include('dash-partials.navbar')
  @yield('content')


  {{-- @include('dash-partials.footer') --}}
  </div>

	</div>
	@include('dash-partials.footer-script')

    <script src="/js/app.js"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  </body>
</html>
