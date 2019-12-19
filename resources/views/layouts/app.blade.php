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

      <!-- Styles -->
      <link href="{{ asset('css/main.css') }}" rel="stylesheet">
  </head>
  <body>
    <ul>
      <!-- Authentication Links -->
      @guest
        <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
        @if (Route::has('register'))
          <li> <a href="{{ route('register') }}">{{ __('Register') }}</a></li>
        @endif
      @else
        <li><a href="{{ url('/home') }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>{{ Auth::user()->name }}</a>
          <div>
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </div>
        </li>
      @endguest
    </ul>
      <main>
        @yield('content')
      </main>
    <script src="{{asset('js/jquery.js')}}"></script>
    @yield('scripts')
  </body>
</html>
