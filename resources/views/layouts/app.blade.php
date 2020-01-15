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
  <body>
    <header>
      <h2><a href="{{ url('/')}}" class="primary-logo"><strong>Property</strong>Management</a></h2>
      <ul class="nav">
        <li><a href="{{ url('/')}}">Home</a></li>
        <li><a href="{{ url('/properties')}}">Properties</a></li>
        <li><a href="#">Tenants</a></li>
        <!-- Authentication Links -->
        <div class="circle">
          <i class="fas fa-user"></i>
        </div>
        @guest
          <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
          @if (Route::has('register'))
            <li> <a href="{{ route('register') }}">{{ __('Register') }}</a></li>
          @endif
        @else
          <li class="admin"><a href="{{ url('/home') }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>{{ Auth::user()->name }}</a>

          </li>
          <li>
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </li>
        @endguest
      </ul>
    </header>

      <main>
        @yield('content')
      </main>
    <script src="{{asset('js/jquery.js')}}"></script>
    @yield('scripts')
  </body>
</html>
