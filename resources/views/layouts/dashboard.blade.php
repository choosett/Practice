@extends('layouts.app')

@section('title', __('Dashboard'))

@section('content')
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="bg-dark text-white p-3" style="width: 250px; min-height: 100vh;">
            <h3>Dashboard</h3>
            <ul class="nav flex-column">
                <li class="nav-item"><a href="{{ route('dashboard') }}" class="nav-link text-white">Home</a></li>
                <li class="nav-item"><a href="{{ route('orders.index') }}" class="nav-link text-white">Orders</a></li>
                <li class="nav-item"><a href="{{ route('products.index') }}" class="nav-link text-white">Products</a></li>
                <li class="nav-item"><a href="{{ route('categories.index') }}" class="nav-link text-white">Categories</a></li>
            </ul>
        </div>
        
        <!-- Content Area -->
        <div class="flex-grow-1 p-4">
            <h2>{{ __('Dashboard') }}</h2>
            <div class="container mt-4">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card bg-info text-white">
                            <div class="card-body">
                                <h5 class="card-title">{{ __('Total Sales') }}</h5>
                                <p class="card-text text-lg font-bold">$ {{ isset($total_sales) ? number_format($total_sales, 2) : 0 }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card bg-success text-white">
                            <div class="card-body">
                                <h5 class="card-title">{{ __('Net Profit') }}</h5>
                                <p class="card-text text-lg font-bold">$ {{ isset($net_profit) ? number_format($net_profit, 2) : 0 }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card bg-warning text-white">
                            <div class="card-body">
                                <h5 class="card-title">{{ __('Invoice Due') }}</h5>
                                <p class="card-text text-lg font-bold">$ {{ isset($invoice_due) ? number_format($invoice_due, 2) : 0 }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
