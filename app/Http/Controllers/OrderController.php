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
}
