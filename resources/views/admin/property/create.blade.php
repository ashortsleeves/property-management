@extends('layouts.admin')

@section('content')
  <h1>Property Create</h1>

  {!! Form::open(['method'=>'POST', 'action'=> 'AdminPropertyController@store'])!!}
    <div class="form-group">
        {!!Form::label('address', 'Address: ')!!}
        {!!Form::text('address', null, ['class'=>'form-control'])!!}
    </div>
    <div class="form-group">
      {!!Form::label('town_id', 'Town: ')!!}
      {!!Form::select('town_id',['' => 'Choose Option'] + $towns, null, ['class'=>'form-control'])!!}
    </div>
        <div class="form-group">
      {!!Form::submit('Create ', ['class'=>'btn btn-primary'])!!}
    </div>
  {!!Form::close()!!}
@endsection
