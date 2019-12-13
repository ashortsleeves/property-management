@extends('layouts.admin')

@section('content')
<table class="table">
  <thead>
    <tr>
      <th>Id</th>
      <th>Street Address</th>
      <th>Town</th>
      <th>State</th>
      <th>Photos</th>
      <th>Rent</th>
      <th>Bed</th>
      <th>Bath</th>
      <th>Pets</th>
      <th>Washer/Dryer</th>
      <th>Created At</th>
      <th>Updated At</th>
    </tr>
  </thead>
  <tbody>
    @if($properties)
      @foreach($properties as $property)
        <tr>
          <td>{{$property->id}}</td>
          <td><a href="{{route('home.property', $property->slug)}}" >{{$property->address}}</a></td>
          <td>{{$property->town->name}}</td>
          <td>{{$property->state}}</td>
          <td><a href="{{route('media.show', $property->id)}}">View Photos</a></td>
          <td>{{$property->rent}}</td>
          <td>{{$property->bedrooms}}</td>
          <td>{{$property->bathrooms}}</td>
          <td>{{$property->pets}}</td>
          <td>{{$property->washer_dryer}}</td>
          <td>{{$property->created_at->diffForHumans()}}</td>
          <td>{{$property->updated_at->diffForHumans()}}</td>
        </tr>
      @endforeach
    @endif
  </tbody>
</table>


@endsection
