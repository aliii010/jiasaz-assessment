<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function createOrder(Request $request)
    {
        $existingOrder = Order::where('customer_id', Auth::id())->first();
        if ($existingOrder) {
            return view('orders/fail', ['message' => 'You already have an order in progress']);
        }

        Order::create([
            'product_id' => $request->product_id,
            'customer_id' => Auth::id(),
            'status_id' => OrderStatus::where('status', 'pending')->first()->id,
        ]);

        return view('orders.success');
    }

    public function showCustomerOrders(Request $request)
    {
        $user = Auth::user();
        $orders = $user->orders;
        $statuses = OrderStatus::all();

        if ($request->has('status') && $request->status != '') {
            $orders = $orders->where('status_id', $request->status);
        }

        return view('orders.my-orders', compact('orders', 'statuses'));
    }

    public function getAllOrders(Request $request)
    {
        $orders = Order::all();
        $statuses = OrderStatus::all();

        if ($request->has('status') && $request->status != '') {
            $orders = $orders->where('status_id', $request->status);
        }

        return view('orders.all-orders', compact('orders', 'statuses'));
    }
}
