@extends('layouts.app')

@section('content')
  @if($properties)
    @foreach ($properties as $property)

      <ul>
        <li>${{$property->rent}}/month</li>
        <li>{{$property->address}}</li>
        <li>{{$property->town->name}}</li>
        <li>{{$property->state}}</li>
      </ul>

      @if($property->photos)
        @foreach($property->photos as $photo)
          <img src="{{$photo->file}}" width="150" height="150"/>
        @endforeach
      @endif
      <a href="{{route('home.property', $property->slug)}}">View Property</a>
    @endforeach
  @endif


@endsection
