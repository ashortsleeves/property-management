<form action="{{route('home.properties')}}">
  <div>
    <div>
      <h3>Search By Street</h3>
      <input class="form-control" type="search" name="q" value="{{ $q }}">
    </div>




    <h3>Filter By State</h3>

    @foreach($states as $state)

      <input class="state-check" type="checkbox" name="s[]" value="{{$state->id}}" {{in_array($state->id, $s) ? 'checked': ''}}>{{$state->name}}</input>
      <br>
    @endforeach


    <h3>Filter By Towns</h3>

    @foreach($towns as $town)
      <div class="town-check" data-state="{{$town->state_id}}">
        <label for="{{$town->id}}">{{$town->name}}</label>
        <input id="{{$town->id}}" type="checkbox" name="t[]" value="{{$town->id}}" {{in_array($town->id, $t) ? 'checked': ''}}>
      </div>


    @endforeach
    <h3>Filter Results By</h3>

    <select name="sortBy" class="form-control" value="{{ $sortBy }}">
      @foreach(['rent', 'state'] as $col)
        <option @if($col == $sortBy) selected @endif value="{{ $col }}">{{ ucfirst($col) }}</option>
      @endforeach
    </select>

    <select name="orderBy" class="form-control" value="{{ $orderBy }}">
      @foreach(['asc', 'desc'] as $order)
        <option @if($order == $orderBy) selected @endif value="{{ $order }}">{{ ucfirst($order) }}</option>
      @endforeach
    </select>

    <select name="perPage" class="form-control" value="{{ $perPage }}">
      @foreach(['20','50','100','250'] as $page)
        <option @if($page == $perPage) selected @endif value="{{ $page }}">{{ $page }}</option>
      @endforeach
    </select>

    <button type="submit">Filter</button>
  </div>
</form>


@section('scripts')
  <script src="{{asset('js/filter.js')}}"></script>
@endsection
