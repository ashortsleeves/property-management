@extends('layouts.app')

@section('content')
  <ul>
    <li>${{$property->rent}}/month</li>
    <li>{{$property->address}}</li>
    <li>{{$property->town->name}}</li>

    <li>{{$property->state}}</li>
  </ul>

  @if($photos)
    @foreach($photos as $photo)
      <img src="{{$photo->file}}" />
    @endforeach
  @endif

@endsection
