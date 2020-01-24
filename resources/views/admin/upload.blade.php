@extends('layouts.admin')
@section('content')
  <h1>UPLOAD FILE</h1>

  <form action="{{route('upload')}}" method="post" enctype="multipart/form-data">
    @csrf

    <input type="file" name="file" class="form-control">
    <input type="submit" class="btn">

  </form>
@endsection
