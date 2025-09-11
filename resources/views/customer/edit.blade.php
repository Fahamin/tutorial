@include('welcome')
@section('content')

@endsection


<div class="container mt-5">

    </h1>Customer Edit</h1>

    <form action="{{ route('customer.update', $customer->id)  }}" method="POST">

        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label"> Name</label>
            <input type="text" class="form-control" id="name" name="name" required value="{{ $customer->name }}">

            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror


<div class="mb-3">
                    <label for="phone" class="form-label"> phone</label>
                    <input type="text" class="form-control" id="phone" value="{{ $customer->phone }}" name="phone"
                        required>
                    @error('phone')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                </div>

            <div class="mb-3">
                <label for="phone" class="form-label"> email</label>
                <input type="text" class="form-control" id="email" value="{{ $customer->email }}" name="email" required>
                @error('phone')
                    <div class="text-danger">{{ $message }}</div>

                @enderror
                
                <button type="submit" class="btn btn-primary">Edit</button>
    </form>