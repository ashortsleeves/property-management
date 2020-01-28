@extends('layouts.admin')
@section('styles')

@endsection
@section('content')
@include('includes.tinyeditor')


  <h1>Property Create</h1>


  {!! Form::open(['method'=>'POST','id'=>'propertyForm', 'action'=> 'AdminPropertyController@store', 'files'=>true, 'autocomplete'=>"off"])!!}
    <div class="form-group">
        {!!Form::label('address', 'Address: ')!!}
        {!!Form::text('address', null, ['class'=>'form-control'])!!}
    </div>


    <div class="form-group">
      {!!Form::label('state_id', 'State: ')!!}
      {!!Form::select('state_id',['' => 'Choose Option'] +  $states + [$newStateId => 'New State'], null, ['class'=>'form-control form-towns'])!!}
    </div>


    <div class="form-group form-newState form-hidden">
      {!!Form::label('state_new', 'New State: ')!!}
      {!!Form::select('state_new', ['' => 'Choose Option'] + $statesList, null, ['class'=>'form-control'])!!}
    </div>

    <div class="form-group">
      {!!Form::label('town_id', 'Town: ')!!}
      <select class="form-control form-towns" id="town_id" name="town_id">
        <option class="choose" value="">Choose Option</option>
        @foreach($towns as $town)
          <option class="town" value="{{$town->id}}" data-state="{{$town->state_id}}">{{$town->name}}</option>
        @endforeach
        <option value="{{$newTownId}}">New Town</option>
      </select>
    </div>
    <div class="form-group form-newTown form-hidden">
      {!!Form::label('town_new', 'New Town: ')!!}
      {!!Form::text('town_new', null, ['class'=>'form-control'], )!!}
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
    <div class="form-group form-group-files">
      {!!Form::label('file', 'Gallery: ')!!}

      <div class="form-group-media">
        <a class="btn btn-file" href="#">Add Images<input name="media[]" type="file" class="media" multiple></a>
      </div>
      <div id="selectedFiles"></div>
    </div>

    <div class="form-group">
      {!!Form::label('body', 'Description: ')!!}
      {!!Form::textarea('body', null, ['class'=>'form-control','rows'=>5])!!}
    </div>
    <div class="form-group">
      {!!Form::submit('Create ', ['class'=>'btn btn-primary'])!!}
    </div>
  {!!Form::close()!!}

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
