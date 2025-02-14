@extends('layouts.app')

@section('title', __('Dashboard'))

@section('content')
    <div class="container mt-4">
        <div class="row">
            <!-- Total Sales -->
            <div class="col-md-3">
                <div class="card bg-info text-white">
                    <div class="card-body">
                        <h5 class="card-title">{{ __('Total Sales') }}</h5>
                        <p class="card-text text-lg font-bold">$ {{ number_format($total_sales, 2) }}</p>
                    </div>
                </div>
            </div>
            
            <!-- Net Profit -->
            <div class="col-md-3">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <h5 class="card-title">{{ __('Net Profit') }}</h5>
                        <p class="card-text text-lg font-bold">$ {{ number_format($net_profit, 2) }}</p>
                    </div>
                </div>
            </div>

            <!-- Invoice Due -->
            <div class="col-md-3">
                <div class="card bg-warning text-white">
                    <div class="card-body">
                        <h5 class="card-title">{{ __('Invoice Due') }}</h5>
                        <p class="card-text text-lg font-bold">$ {{ number_format($invoice_due, 2) }}</p>
                    </div>
                </div>
            </div>

            <!-- Total Sell Return -->
            <div class="col-md-3">
                <div class="card bg-danger text-white">
                    <div class="card-body">
                        <h5 class="card-title">{{ __('Total Sell Return') }}</h5>
                        <p class="card-text text-lg font-bold">$ {{ number_format($total_sell_return, 2) }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sales Last 30 Days Graph -->
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ __('Sales Last 30 Days') }}</h5>
                        <canvas id="salesLast30DaysChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Sales Current Financial Year Graph -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ __('Sales Current Financial Year') }}</h5>
                        <canvas id="salesCurrentYearChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts.js Script -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx1 = document.getElementById('salesLast30DaysChart').getContext('2d');
        var salesChart1 = new Chart(ctx1, {
            type: 'line',
            data: {
                labels: @json($last_30_days_sales_labels),
                datasets: [{
                    label: 'Sales',
                    data: @json($last_30_days_sales_data),
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 2
                }]
            }
        });

        var ctx2 = document.getElementById('salesCurrentYearChart').getContext('2d');
        var salesChart2 = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: @json($current_year_sales_labels),
                datasets: [{
                    label: 'Sales',
                    data: @json($current_year_sales_data),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 2
                }]
            }
        });
    </script>
@endsection
