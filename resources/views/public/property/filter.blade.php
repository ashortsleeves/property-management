<form class="filters" action="{{route('home.properties')}}">
  <div>
    <div class="filter-block">
      <h3>Search By Street</h3>
      <input placeholder="&#xf002;" class="form-control empty" type="search" id="iconified" name="q" value="{{ $q }}">
    </div>

    <div class="filter-block">
      <h3>Filter By State</h3>

      @foreach($states as $state)

        <div class="filter-box">
          <input class="state-check" type="checkbox" name="s[]" value="{{$state->id}}" {{in_array($state->id, $s) ? 'checked': ''}}> {{$state->name}}</input>
        </div>
      @endforeach
    </div>

    <div class="filter-block">
    <h3>Filter By Towns</h3>
      @foreach($towns as $town)
        <div class="town-check filter-box" data-state="{{$town->state_id}}">
          <input id="{{$town->id}}" type="checkbox" name="t[]" value="{{$town->id}}" {{in_array($town->id, $t) ? 'checked': ''}}>
          <label for="{{$town->id}}">{{$town->name}} {{$town->state->name}}</label>
        </div>
      @endforeach
    </div>
    <div class="filter-block">
      <h3>Filter Results By</h3>
      <div class="filter-select-box">
        <div class="select-wrapper">
          <select name="sortBy" class="form-control" value="{{ $sortBy }}">
            @foreach(['rent', 'state_id'] as $col)
              <option @if($col == $sortBy) selected @endif value="{{ $col }}">{{ ucfirst($col) }}</option>
            @endforeach
          </select>
        </div>

        <div class="select-wrapper">
          <select name="orderBy" class="form-control" value="{{ $orderBy }}">
            @foreach(['asc', 'desc'] as $order)
              <option @if($order == $orderBy) selected @endif value="{{ $order }}">{{ ucfirst($order) }}</option>
            @endforeach
          </select>
        </div>

        <div class="select-wrapper">
          <select name="perPage" class="form-control" value="{{ $perPage }}">
            @foreach(['20','50','100','250'] as $page)
              <option @if($page == $perPage) selected @endif value="{{ $page }}">{{ $page }}</option>
            @endforeach
          </select>
        </div>
      </div>
    </div>
    <button type="submit">Filter</button>
  </div>
</form>


@section('scripts')
  <script src="{{asset('js/filter.js')}}"></script>
@endsection
