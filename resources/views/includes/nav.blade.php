<ul class="nav">
  <li><a href="{{ url('/')}}/">Home</a></li>
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
