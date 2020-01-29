<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">

      <title>{{ config('app.name', 'Laravel') }}</title>


      <!-- Fonts -->
      <link rel="dns-prefetch" href="//fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
      <link href="{{asset('css/all.min.css')}}" rel="stylesheet">

      <!-- Styles -->
      <link href="{{ asset('css/main.css') }}" rel="stylesheet">
  </head>
  <body class="sideNavBody">
    <header>
      <h2><a href="{{ url('/')}}" class="primary-logo"><strong>Property</strong>Management</a></h2>
        @include('includes.nav')
      <a href="#" class="hamburger"><i class="fas fa-bars"></i><i class="fas fa-arrow-left"></i></a>
    </header>

      <main>
        @yield('content')
      </main>
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
    @yield('scripts')
  </body>
  <div class="sideNav">
    @include('includes.nav')
  </div>
</html>
