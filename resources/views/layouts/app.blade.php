<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="bg-dark text-white p-3" style="width: 250px; min-height: 100vh;">
            <h3>Dashboard</h3>
            <ul class="nav flex-column">
                <li class="nav-item"><a href="{{ route('orders.index') }}" class="nav-link text-white">Orders</a></li>
                <li class="nav-item"><a href="{{ route('products.index') }}" class="nav-link text-white">Products</a></li>
                <li class="nav-item"><a href="{{ route('categories.index') }}" class="nav-link text-white">Categories</a></li>
            </ul>
        </div>

        <!-- Content Area -->
        <div class="flex-grow-1 p-4">
            @yield('content')
        </div>
    </div>
</body>
</html>

