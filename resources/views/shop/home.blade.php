@include('welcome')
@section('content')
@endsection

<div class="container mt-5">

  <a href="{{ route('shop.create') }}" class="btn btn-success mb-3">Add New Shop</a>

  @if (session()->has('Success'))
    <div class="alert alert-success">
      {{ Session::get('Success') }}
    </div>
  @endif

  @if (session('error'))
    <div class="alert alert-danger">
      {{ Session::get('error') }}
    </div>

  @endif

  <form action="{{ route('shop.index') }}" method="GET">
    <div class="input-group mb-3">
      <input type="text" class="form-control" placeholder="Search" name="search"
        value="{{ request('search') }}">
      <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
    </div>
</form>

  <table class="table">
    <thead>
      <tr>
        <th scope="col">Sl</th>
        <th scope="col">Shop Name</th>
        <th scope="col">Shop Number</th>
        <th scope="col">Shop Address</th>
        <th scope="col">Shop Phone</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($shopsList as $shop)


        <tr>
          <th scope="row">{{$shop->id}}</th>
          <td>{{$shop->shop_name}}</td>
          <td>{{$shop->shop_number}}</td>
          <td>{{$shop->shop_address}}</td>
          <td>{{$shop->shop_phone}}</td>

          <td>

            <form action="{{ route('shop.destroy', $shop->id) }}" method="POST" style="display:inline;">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger"
                onclick="return confirm('Are you sure you want to delete this shop?')">Delete</button>

            </form>
            <a href="{{ route('shop.edit', $shop->id) }}" class="btn btn-primary">Edit</a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>

  {{ $shopsList->links() }}
</div>