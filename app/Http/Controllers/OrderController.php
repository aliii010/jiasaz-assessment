<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function createOrder(Request $request)
    {
        Order::create([
            'product_id' => $request->product_id,
            'customer_id' => Auth::id(),
        ]);

        return view('orders.success');
    }

    public function showCustomerOrders(Request $request)
    {
        $user = Auth::user();
        $orders = $user->orders;

        return view('orders.my-orders', compact('orders'));
    }
}
