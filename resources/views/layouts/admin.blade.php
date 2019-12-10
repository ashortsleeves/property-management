<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <link href="{{asset('css/admin.css')}}" rel="stylesheet">
    <link href="{{asset('css/all.min.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,400i,700&display=swap" rel="stylesheet">
    @yield('styles')
  </head>
  <body>
    <header>
      <h2><a href="{{route('home')}}">Dashboard</a></h2>

      <div class="circle">
        <i class="fas fa-user"></i>
      </div>
    </header>

    <div class="admin-wrap">
      <ul class="sidebar">
        <li class="menu-item">
          <a class="menu-title" href="#">Properties</a>
          <ul class="submenu">
            <li><a href="{{route('property.index')}}">All Properties</a></li>
            <li><a href="{{route('property.create')}}">Add Property</a></li>
          </ul>
        </li>
        <li class="menu-item">
          <a class="menu-title" href="#">Tenants</a>
          <ul class="submenu">
            <li><a href="#">All Tenants</a></li>
            <li><a href="#">Add Tenant</a></li>
          </ul>
        </li>
        <li class="menu-item">
          <a class="menu-title" href="#">Images</a>
          <ul class="submenu">
            <li><a href="{{route('media.index')}}">All Images</a></li>
            <li><a href="{{route('media.create')}}">Add Images</a></li>
          </ul>
        </li>
        <li class="menu-item">
          <a class="menu-title" href="#">Users</a>
          <ul class="submenu">
            <li><a href="{{route('users.index')}}">All Users</a></li>
            <li><a href="#">Add User</a></li>
          </ul>
        </li>
      </ul>
      <div class="content">
        <h1 class="title">{{ucfirst(str_replace('admin/', '', Request::path()))}}</h1>
        @yield('content')
      </div>
    </div>


    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/admin.js')}}"></script>
    @yield('scripts')
  </body>
</html>
