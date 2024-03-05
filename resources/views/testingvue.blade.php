@extends('main-layout-package')

@section('content')
 <section class="section section-shaped section-lg">
      <!-- Circles background -->
      <div class="shape shape-style-1 bg-gradient-default" style="margin-top:80px">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
      </div>

      <!-- SVG separator -->
      <div class="separator separator-bottom separator-skew" style="z-index:0">
        {{-- <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
        </svg> --}}
      </div>

<div class="container" style="margin-top:0px;z-index:1">
    <br><br><br><br><br>
<div id="app">
{{-- <example-component></example-component> --}}
@if (Auth::guest())
<testing logged="false"></testing>
@endif

@if (Auth::check())
<testing logged="true" ></testing>
@endif
</div></div>
</section>

@endsection
