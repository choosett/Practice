<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Default values if database is empty
        $total_sales = Order::sum('price') ?? 0;
        $net_profit = $total_sales * 0.2;
        $invoice_due = Order::where('status', 'pending')->sum('price') ?? 0;
        $total_sell_return = Order::where('status', 'returned')->sum('price') ?? 0;

        // Sales Last 30 Days Data
        $last_30_days_sales_labels = [];
        $last_30_days_sales_data = [];
        for ($i = 29; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i)->format('Y-m-d');
            $last_30_days_sales_labels[] = $date;
            $last_30_days_sales_data[] = Order::whereDate('created_at', $date)->sum('price') ?? 0;
        }

        // Sales Current Financial Year Data
        $current_year_sales_labels = [];
        $current_year_sales_data = [];
        for ($i = 1; $i <= 12; $i++) {
            $month = Carbon::now()->subMonths(12 - $i)->format('Y-m');
            $current_year_sales_labels[] = $month;
            $current_year_sales_data[] = Order::whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', $i)
                ->sum('price') ?? 0;
        }

        return view('dashboard', [
            'total_sales' => $total_sales,
            'net_profit' => $net_profit,
            'invoice_due' => $invoice_due,
            'total_sell_return' => $total_sell_return,
            'last_30_days_sales_labels' => $last_30_days_sales_labels,
            'last_30_days_sales_data' => $last_30_days_sales_data,
            'current_year_sales_labels' => $current_year_sales_labels,
            'current_year_sales_data' => $current_year_sales_data,
            'home_menu' => true // Adding home menu flag
        ]);
    }
}
