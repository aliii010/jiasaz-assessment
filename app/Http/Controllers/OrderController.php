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
        $query = Order::query();
        $statuses = OrderStatus::all();

        if ($request->has('status') && $request->status != '') {
            $query->where('status_id', $request->status);
        }

        if ($request->has('customer_name') && $request->customer_name != '') {
            $query->whereHas('customer', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->customer_name . '%');
            });
        }

        if ($request->has('from_date') && $request->from_date != '') {
            $query->whereDate('created_at', '>=', $request->from_date);
        }

        if ($request->has('to_date') && $request->to_date != '') {
            $query->whereDate('created_at', '<=', $request->to_date);
        }

        $orders = $query->get();

        return view('orders.all-orders', compact('orders', 'statuses'));
    }
}
