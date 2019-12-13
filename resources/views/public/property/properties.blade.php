@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-9">
        <div class="row">
          @if($properties)
            @foreach ($properties as $property)
              <div class="col-3">
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
                <br />
                <a href="{{route('home.property', $property->slug)}}">View Property</a>
              </div>

            @endforeach
          @endif
        </div>
      </div>

      <div class="col-3">
        @include('public.property.filter')
      </div>
    </div>
  </div>
@endsection
