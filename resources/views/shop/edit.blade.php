@include('welcome')
@section('content')

@endsection


<div class="container mt-5">

    </h1>Edit Shop</h1>

    <form action="{{ route('shop.update', $shop->id)  }}" method="POST">

        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="shop_name" class="form-label">Shop Name</label>
            <input type="text" class="form-control" id="shop_name" name="shop_name" required
                value="{{ $shop->shop_name }}">

            @error('shop_name')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label for="shop_number" class="form-label">Shop Number</label>
                <input type="text" class="form-control" id="shop_number" value="{{ $shop->shop_number }}"
                    name="shop_number" required>
                @error('shop_number')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

                <div class="mb-3"></div>
                <label for="shop_address" class="form-label">Shop Address</label>
                <input type="text" class="form-control" id="shop_address" value="{{ $shop->shop_address }}"
                    name="shop_address" required>
                @error('shop_address')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

                <div class="mb-3"></div>
                <label for="shop_phone" class="form-label">Shop Phone</label>
                <input type="text" class="form-control" id="shop_phone" value="{{ $shop->shop_name }}" name="shop_phone"
                    required>
                @error('shop_phone')
                    <div class="text-danger">{{ $message }}</div>

                @enderror


            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
    </form>