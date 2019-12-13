@extends('layouts.admin')
@section('styles')

@endsection
@section('content')
  <h1>Property Create</h1>


  {!! Form::open(['method'=>'POST', 'action'=> 'AdminPropertyController@store', 'files'=>true, 'class'=>"dropzone"])!!}
    <div class="form-group">
        {!!Form::label('address', 'Address: ')!!}
        {!!Form::text('address', null, ['class'=>'form-control'])!!}
    </div>
    <div class="form-group">
      {!!Form::label('town_id', 'Town: ')!!}
      {!!Form::select('town_id',['' => 'Choose Option'] +  $towns + [$newTownId => 'New Town'], null, ['class'=>'form-control form-towns'])!!}
    </div>
    <div class="form-group form-newTown form-hidden">
      {!!Form::label('town_new', 'New Town: ')!!}
      {!!Form::text('town_new', null, ['class'=>'form-control'])!!}
    </div>
    <div class="form-group">
      {!!Form::label('state', 'State: ')!!}
      {!!Form::select('state', ['' => 'Choose Option'] + $states, null, ['class'=>'form-control'])!!}
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
    <div class="form-group">
      {!!Form::label('file', 'File: ')!!}

      <input name="media[]" type="file" id="media" multiple>
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
@endsection
