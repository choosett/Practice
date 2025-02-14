<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // 1️⃣ Order List দেখানোর ফাংশন
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->get();
        return view('orders.index', compact('orders'));
    }

    // 2️⃣ নতুন Order তৈরি করার ফর্ম দেখানোর ফাংশন
    public function create()
    {
        return view('orders.create');
    }

    // 3️⃣ Order Database-এ সংরক্ষণ করার ফাংশন
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:1',
        ]);

        Order::create([
            'user_id' => Auth::id(),
            'product_name' => $request->product_name,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'status' => 'pending',
        ]);

        return redirect()->route('orders.index')->with('success', 'Order placed successfully!');
    }
}
