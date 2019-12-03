@extends('layouts.admin')

@section('content')
<table class="table">
  <thead>
    <tr>
      <th>Id</th>
      <th>Street Address</th>
      <th>Town</th>
      <th>Created At</th>
      <th>Updated At</th>
    </tr>
  </thead>
  <tbody>
    @if($properties)
      @foreach($properties as $property)
        <tr>
          <td>{{$property->id}}</td>
          <td>{{$property->address}}</td>
          <td>{{$property->town->name}}</td>
          <td>{{$property->created_at->diffForHumans()}}</td>
          <td>{{$property->updated_at->diffForHumans()}}</td>
        </tr>
      @endforeach
    @endif
  </tbody>
</table>


@endsection
