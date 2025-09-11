
@include('welcome')
@section('content')
@endsection

<div class="container mt-5">

<a href="{{ route('customer.index') }}" class="btn btn-primary mb-3">Customer List</a>

<form action="{{ route ('customer.store')  }}" method="POST">
    @csrf
  <div class="mb-3">
    <label for="name" class="form-label"> Name</label>
    <input type="text" class="form-control" id="name" name="name" required>   
    @error('name')
        <div class="text-danger">{{ $message }}</div>       
    @enderror


    <div class="mb-3"></div>
        <label for="phone" class="form-label">Shop Phone</label>   
        <input type="text" class="form-control" id="phone" name="phone" required>
        @error('phone')
            <div class="text-danger">{{ $message }}</div>

        @enderror


         <div class="mb-3"></div>
        <label for="email" class="form-label">Email</label>   
        <input type="text" class="form-control" id="email" name="email" required>
        @error('email')
            <div class="text-danger">{{ $message }}</div>

        @enderror


</div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

