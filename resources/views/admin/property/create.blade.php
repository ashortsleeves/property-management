@extends('layouts.admin')

@section('content')
  <h1>Property Create</h1>

  {!! Form::open(['method'=>'POST', 'action'=> 'AdminPropertyController@store'])!!}
    <div class="form-group">
        {!!Form::label('address', 'Address: ')!!}
        {!!Form::text('address', null, ['class'=>'form-control'])!!}
    </div>
    <div class="form-group">
        {!!Form::label('rent', 'Rent: ')!!}
        {!!Form::text('rent', null, ['class'=>'form-control'])!!}
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
      {!!Form::submit('Create ', ['class'=>'btn btn-primary'])!!}
    </div>
  {!!Form::close()!!}
@endsection
