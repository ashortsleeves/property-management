@extends('layouts.app')

@section('content')
  <div class="offwhite">
    <div class="container listings-container">
      <div class="row">
        <div class="col col-9">
          <div class="row">
            {{-- @if($featimg)
              <h1>YEP</h1>
            @endif --}}
            @if($properties)
              @foreach ($properties as $property)
                <div class="col col-4 listings-single">
                  <div class="listings-single-container">
                    @if($property->featimg())
                      {{-- @foreach($property->featimg as $photo) --}}
                        <div class="listing-hero jumbo-bg" style="background-image: url({{$property->featimg()->file}})">
                          <div class="rent">${{$property->rent}}/month</div>
                        </div>
                      {{-- @endforeach --}}
                      {{-- @foreach($property->featimg as $photo)
                        <div class="listing-hero jumbo-bg" style="background-image: url({{$photo->file}})">
                          <div class="rent">${{$property->rent}}/month</div>
                        </div>
                      @endforeach --}}
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

        <div class="col col-3">
          @include('public.property.filter')
        </div>
      </div>
    </div>
  </div>
@endsection
