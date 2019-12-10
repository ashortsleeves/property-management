@extends('layouts.admin')

@section('content')
  <h1>Media</h1>
  @if($photos)
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Image</th>
        <th>Created Date</th>
      </tr>
    </thead>
    <tbody>
      @foreach($photos as $photo)
      <tr>
        <td>{{$photo->id}}</td>
        <td>{{$photo->file}}</td>
        <td><img src="{{$photo->file}}" alt=" " /></td>
        <td>{{$photo->created_at}}</td>
      </tr>
    @endforeach
    </tbody>
  </table>
@endif
@endsection
