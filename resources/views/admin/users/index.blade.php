@extends('layouts.admin')

@section('content')
  @if(Session::has('deleted_user'))
    <h2>
      {{session('deleted_user')}}
    </h2>
  @endif
<table class="table">
  <thead>
    <tr>
      <th>Photo</th>
      <th>Id</th>
      <th>Name</th>
      <th>Email</th>
      <th>Role</th>
      <th>Active</th>
      <th>Created At</th>
      <th>Updated At</th>
    </tr>
  </thead>
  <tbody>
    @if($users)
      @foreach($users as $user)
        <tr>
          <td>
            @if($user->photo)
              <img height="50px" src="{{$user->photo->file}}"  />
            @else
            <div class="circle">
              <i class="fas fa-user"></i>
            </div>
            @endif
          </td>
          <td>{{$user->id}}</td>
          <td><a href="{{route('users.edit', $user->id)}}">{{$user->name}}</a></td>
          <td>{{$user->email}}</td>
          {{-- <td>{{$user->role->name}}</td> --}}
          <td>{{$user->is_active ? 'Yes' : 'Nope'}}</td>
          <td>{{$user->created_at->diffForHumans()}}</td>
          <td>{{$user->updated_at->diffForHumans()}}</td>
        </tr>
      @endforeach
    @endif
  </tbody>
</table>


@endsection
