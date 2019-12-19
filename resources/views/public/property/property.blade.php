@extends('layouts.app')

@section('content')
  <a href="{{route('home.properties')}}">Back to all Properties</a>
  <ul>
    <li>${{$property->rent}}/month</li>
    <li>{{$property->address}}</li>
    <li>{{$property->town->name}}</li>
    <li>{{$property->state->name}}</li>
  </ul>

  @if($photos)
    @foreach($photos as $photo)
      <img src="{{$photo->file}}" />
    @endforeach
  @endif

@endsection
