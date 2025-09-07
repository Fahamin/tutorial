
@include('welcome')
@section('content')
@endsection

<div class="container mt-5">

<a href="{{ route('shop.create') }}" class="btn btn-success mb-3">Add New Shop</a>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Shop Name</th>
      <th scope="col">Shop Number</th>
      <th scope="col">Shop Address</th>
      <th scope="col">Shop Phone</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ( $shopsList as $shop )
    

    <tr>
      <th scope="row">{{$shop->id}}</th>
      <td>{{$shop->shop_name}}</td>
      <td>{{$shop->shop_number}}</td>
      <td>{{$shop->shop_address}}</td>
      <td>{{$shop->shop_phone}}</td>
      
      <td>
        <a href="" class="btn btn-danger">Delete</a>
        <a href="" class="btn btn-primary">Edit</a>
      </td>
    </tr>
       @endforeach
  </tbody>
</table>

</div>

