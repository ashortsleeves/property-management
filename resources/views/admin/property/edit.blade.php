@extends('layouts.admin')
@section('styles')

@endsection
@section('content')
@include('includes.tinyeditor')

  <h1>Edit Property</h1>
  <a class="btn btn-view-property" href="{{route('home.property', $property->slug)}}">View Property</a>
  {!! Form::model($property, ['method'=>'PATCH', 'action'=> [ 'AdminPropertyController@update', $property->id], 'files' => true])!!}

  {!! Form::open(['method'=>'POST', 'action'=> 'AdminPropertyController@store', 'files'=>true, 'autocomplete'=>"off"])!!}
    <div class="form-group">
        {!!Form::label('address', 'Address: ')!!}
        {!!Form::text('address', null, ['class'=>'form-control'])!!}
    </div>


    <div class="form-group">
      {!!Form::label('state_id', 'State: ')!!}
      {!!Form::select('state_id',['' => 'Choose Option'] +  $states + [$newStateId => 'New State'], null, ['class'=>'form-control form-towns'])!!}
    </div>


    <div class="form-group form-newState form-hidden">
      {!!Form::select('state_new', ['' => 'Select State'] + $statesList, null, ['class'=>'form-control'])!!}
    </div>

    <div class="form-group">
      {!!Form::label('town_id', 'Town: ')!!}
      <select class="form-control form-towns" id="town_id" name="town_id">
        <option class="choose" value="" >Choose Option</option>
        @foreach($towns as $town)
          <option class="town {{ $town->id === $property->town_id ? 'town-selected' : ''}}" value="{{$town->id}}" data-state="{{$town->state_id}}" {{ $town->id === $property->town_id ? 'selected=selected' : ''}}>{{$town->name}}</option>
        @endforeach
        <option value="{{$newTownId}}">New Town</option>
      </select>
    </div>
    <div class="form-group form-newTown form-hidden">
      {!!Form::text('town_new', null, ['class'=>'form-control', 'placeholder'=>'Town Name'], )!!}
    </div>

    <div class="form-group">
        {!!Form::label('rent', 'Rent: ')!!}
        {!!Form::text('rent', null, ['class'=>'form-control'])!!}
    </div>

    <h2>Additional Information</h2>
    <div class="form-group">
        {!!Form::label('bedrooms', 'Bedrooms: ')!!}
        {!!Form::text('bedrooms', null, ['class'=>'form-control'])!!}
    </div>
    <div class="form-group">
        {!!Form::label('bathrooms', 'Bathrooms: ')!!}
        {!!Form::text('bathrooms', null, ['class'=>'form-control'])!!}
    </div>
    <div class="form-group">
      {!!Form::label('washer_dryer', 'Washer/Dryer: ')!!}
      {!!Form::select('washer_dryer', ['' => 'Choose Option'] + $washerdryer, null, ['class'=>'form-control'])!!}
    </div>


    <div class="form-group">
      {!!Form::label('pets', 'Pets: ')!!}
      {!!Form::select('pets', ['' => 'Choose Option'] + $pets, null, ['class'=>'form-control'])!!}
    </div>

    <div class="form-group form-group-files" id="form-group-files">
      {!!Form::label('file', 'Gallery: ')!!}
      <div class="form-group-media">
        <a class="btn btn-file" href="#form-group-files">Add Images<input name="media[]" type="file" class="media" multiple></a>
      </div>


      <div id="selectedFiles">

      </div>


      @if($property->photos)

        <h3>Current Photos</h3>

        @foreach($property->photos as $photo )

          <div class="img-wrap" style="background-image: url({{$photo->file}})">

            <span class="featimg {{ $photo->featured == 1 ? 'featured-true' : ''}}">
              <input {{ $photo->featured == 1 ? 'checked="checked"' : ''}} type="radio" name="featured" value="{{ $photo->file }}">
            </span>


            <span class="beleted">
              <input id="box{{$loop->iteration}}" name="delete[{{$photo->id}}]" type="checkbox" href="#" value="{{$photo->id}}" />
              <label for="box{{$loop->iteration}}"></label>
            </span>

          </div>

        @endforeach

      @endif
    </div>

    <div class="form-group">
      {!!Form::label('body', 'Description: ')!!}
      {!!Form::textarea('body', null, ['class'=>'form-control','rows'=>5])!!}
    </div>
    <div class="form-group">
      {!!Form::submit('Update ', ['class'=>'btn btn-primary'])!!}
    </div>
  {!!Form::close()!!}
  <div class="property-delete">
    <a class="delete">Delete Property</a>
    {!!Form::open(['method'=>'DELETE', 'class'=>'form-delete','action'=>['AdminPropertyController@destroy', $property->id]])!!}
      <p><strong>Warning:</strong> you are about to delete this property along with all associated images and files. Are you sure you want to do this?</p>
      <br />
      <div class="form-group">
        {!! Form::label('agree', 'I Understand: ') !!}
        {!! Form::checkbox('agree') !!}

      </div>
      {!!Form::submit('Delete Property', ['class'=>'btn btn-danger'])!!}
    {!!Form::close()!!}
  </div>

  @if(count($errors) > 0)
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error )
          <li style="color:red;">
            {{$error}}
          </li>
        @endforeach
      </ul>
    </div>
  @endif
@endsection

@section('scripts')
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

  <script src="{{asset('js/admin-properties.js')}}"></script>
@endsection
