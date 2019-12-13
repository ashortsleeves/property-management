<form action="{{route('home.properties')}}">
  <div>
    <div>
      <h3>Search By Street, Town, or State</h3>
      <input class="form-control" type="search" name="q" value="{{ $q }}">
    </div>
    <h3>Filter By Towns</h3>

    @foreach($towns as $town)

      <input type="checkbox" name="t[]" value="{{$town->id}}" {{in_array($town->id, $t) ? 'checked': ''}}>{{$town->name}}</input>
      <br>
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
