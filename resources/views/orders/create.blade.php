@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Place a New Order</h2>
    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="product_name" class="form-label">Product Name</label>
            <input type="text" name="product_name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" name="quantity" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="text" name="price" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Submit Order</button>
    </form>
</div>
@endsection
