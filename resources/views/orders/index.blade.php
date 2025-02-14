@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h2>Orders List</h2>
    <a href="{{ route('orders.create') }}" class="btn btn-primary mb-3">Place New Order</a>
    <table class="table">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->product_name }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>${{ number_format($order->price, 2) }}</td>
                    <td>{{ ucfirst($order->status) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
