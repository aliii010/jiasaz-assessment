<?php

namespace App\Http\Controllers;

use App\Models\Order;
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
        ]);

        return view('orders.success');
    }

    public function showCustomerOrders(Request $request)
    {
        $user = Auth::user();
        $orders = $user->orders;
        $statuses = getPossibleStatuses();

        if ($request->has('status') && $request->status != '') {
            $orders = $orders->where('status', $request->status);
        }

        return view('orders.my-orders', compact('orders', 'statuses'));
    }

    public function getAllOrders(Request $request)
    {
        $query = Order::query();
        $statuses = getPossibleStatuses();

        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
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

    public function updateOrderStatus(Request $request)
    {
        $order = Order::find($request->order_id);
        $transition = $request->transition;
        $user = $request->user();

        $requiredPermission = $transition . '_orders';
        if (!$user->can($requiredPermission)) {
            return view('orders.fail', ['message' => 'You do not have permission to perform this action']);
        }

        if ($transition == 'deliver' && $order->driver_id != $user->id) {
            return view('orders.fail', ['message' => 'You are not assigned to this order']);
        }

        $stateMachine = $order->stateMachine();
        if (!$stateMachine->can($transition)) {
            return view('orders.fail', ['message' => 'Invalid transition']);
        }

        $stateMachine->apply($transition);
        $order->save();

        return redirect()->route('orders.getAllOrders');
    }

    public function assignOrderToDriver(Request $request, $orderId)
    {
        $order = Order::find($orderId);
        $user = $request->user();

        if (!$user->can('deliver_orders')) {
            return view('orders.fail', ['message' => 'You do not have permission to perform this action']);
        }

        $order->driver_id = $user->id;
        $order->save();

        return redirect()->route('orders.getAllOrders');
    }
}
