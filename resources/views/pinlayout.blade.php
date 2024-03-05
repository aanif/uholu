<!DOCTYPE html>
<html lang="en">
  <head>
    @include('main-partials.head')
  </head>

  <body>
        @yield('content')

        @include('main-partials.footer-script')

        <script src="/js/app.js"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    </body>
  </html>
