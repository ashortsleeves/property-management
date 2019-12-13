<form action="{{route('home.properties')}}">
  <div>
    <div>
      <h3>Search for Property</h3>
      <input class="form-control form-control-sm" type="search" name="q" value="{{ $q }}">
    </div>
    <h3>Filter Results By</h3>
    <div class="col-md-2 col-3">
      <select name="sortBy" class="form-control form-control-sm" value="{{ $sortBy }}">
        @foreach(['rent', 'state'] as $col)
          <option @if($col == $sortBy) selected @endif value="{{ $col }}">{{ ucfirst($col) }}</option>
        @endforeach
      </select>
    </div>

    <div class="col-md-2 col-3">
      <select name="orderBy" class="form-control form-control-sm" value="{{ $orderBy }}">
        @foreach(['asc', 'desc'] as $order)
          <option @if($order == $orderBy) selected @endif value="{{ $order }}">{{ ucfirst($order) }}</option>
        @endforeach
      </select>
    </div>

    <div class="col-md-2 col-3">
      <select name="perPage" class="form-control form-control-sm" value="{{ $perPage }}">
        @foreach(['20','50','100','250'] as $page)
          <option @if($page == $perPage) selected @endif value="{{ $page }}">{{ $page }}</option>
        @endforeach
      </select>
    </div>

    <div class="col-md-2 col-3">
      <button type="submit" class="w-100 btn btn-sm bg-blue">Filter</button>
    </div>
  </div>
</form>
