@extends('layouts.app')

@section('content')
  <div class="offwhite">
    <div class="container listings-container">
      <div class="row">
        <a class="btn mobile-filter" href="#">Filter Results <i class="fas fa-search"></i></a>
        <div class="col col-md-3 col-filter" style="height: 1px;">
            @include('public.property.filter')
        </div>
        <div class="col col-md-9">
          <div class="row">
            @if($properties)
              @foreach ($properties as $property)
                <div class="col col-sm-6 col-lg-4 listings-single">
                  <div class="listings-single-container">
                    @if($property->featimg())
                      <div class="listing-hero jumbo-bg" style="background-image: url({{$property->featimg()->file}})">
                        <div class="rent">${{$property->rent}}/month</div>
                      </div>
                    @endif
                    <ul>
                      <li>{{$property->address}}</li>
                      <li>{{$property->town->name}}</li>
                      <li>{{$property->state->name}}</li>
                    </ul>
                    <a class="btn" href="{{route('home.property', $property->slug)}}">View Property</a>
                  </div>
                </div>
              @endforeach
            @endif
          </div>
            {{$properties->render()}}
        </div>
      </div>
    </div>
  </div>
@endsection
