
@include('welcome')
@section('content')
@endsection

<div class="container mt-5">

<a href="{{ route('shop.index') }}" class="btn btn-primary mb-3">Shop List</a>

<form action="{{ route ('shop.store')  }}" method="POST">
    @csrf
  <div class="mb-3">
    <label for="shop_name" class="form-label">Shop Name</label>
    <input type="text" class="form-control" id="shop_name" name="shop_name" required>   
    @error('shop_name')
        <div class="text-danger">{{ $message }}</div>       
    @enderror

    <div class="mb-3">
        <label for="shop_number" class="form-label">Shop Number</label>
        <input type="text" class="form-control" id="shop_number" name="shop_number" required>   
        @error('shop_number')
            <div class="text-danger">{{ $message }}</div>       
        @enderror

    <div class="mb-3"></div>
        <label for="shop_address" class="form-label">Shop Address</label>
        <input type="text" class="form-control" id="shop_address" name="shop_address" required>
        @error('shop_address')
            <div class="text-danger">{{ $message }}</div>   
        @enderror

    <div class="mb-3"></div>
        <label for="shop_phone" class="form-label">Shop Phone</label>   
        <input type="text" class="form-control" id="shop_phone" name="shop_phone" required>
        @error('shop_phone')
            <div class="text-danger">{{ $message }}</div>

        @enderror


</div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

