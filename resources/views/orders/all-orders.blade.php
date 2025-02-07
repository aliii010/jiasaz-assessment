<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
            {{ __('My Orders') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-dark overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="mb-4">
                    <form method="GET" action="{{ route('orders.getAllOrders') }}">
                        <label for="status" class="block text-sm font-medium text-gray-700 dark:text-white">Filter by
                            Status</label>
                        <select id="status" name="status"
                            class="form-select mr-4 bg-white dark:bg-black dark:text-white border dark:border-gray-600 rounded">
                            <option value="">All</option>
                            @foreach ($statuses as $status)
                                <option value="{{ $status }}"
                                    {{ request('status') == $status ? 'selected' : '' }}>
                                    {{ $status }}
                                </option>
                            @endforeach
                        </select>

                        <label for="customer_name"
                            class="block text-sm font-medium text-gray-700 dark:text-white mt-4">Filter by Customer
                            Name</label>
                        <input type="text" id="customer_name" name="customer_name"
                            class="form-input mt-1 block w-full bg-white dark:bg-black dark:text-white border dark:border-gray-600 rounded"
                            value="{{ request('customer_name') }}">

                        <label for="from_date" class="block text-sm font-medium text-gray-700 dark:text-white mt-4">From
                            Date</label>
                        <input type="date" id="from_date" name="from_date"
                            class="form-input mt-1 block w-full bg-white dark:bg-black dark:text-white border dark:border-gray-600 rounded"
                            value="{{ request('from_date') }}">

                        <label for="to_date" class="block text-sm font-medium text-gray-700 dark:text-white mt-4">To
                            Date</label>
                        <input type="date" id="to_date" name="to_date"
                            class="form-input mt-1 block w-full bg-white dark:bg-black dark:text-white border dark:border-gray-600 rounded"
                            value="{{ request('to_date') }}">

                        <button type="submit"
                            class="mt-2 px-4 py-2 bg-blue-500 dark:bg-primary hover:bg-blue-700 dark:hover:bg-primary-dark text-white rounded-md">Filter</button>
                    </form>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @if ($orders->isEmpty())
                        <div
                            class="bg-white dark:bg-dark border border-gray-200 dark:border-gray-600 rounded-lg shadow-md p-4 relative">
                            <p class="text-gray-800 dark:text-white font-bold">{{ __('No orders found') }}</p>
                        </div>
                    @endif

                    @foreach ($orders as $order)
                        <div
                            class="bg-white dark:bg-black border border-gray-200 dark:border-gray-600 rounded-lg shadow-md p-4 relative">
                            <img src="{{ asset('images/no-image.jpg') }}" alt="{{ $order->product->name }}"
                                class="w-full h-48 object-cover rounded-t-lg">
                            <div class="p-4">
                                <h3 class="text-lg font-semibold mt-4 dark:text-white">{{ $order->product->name }}</h3>
                                <p class="text-gray-800 dark:text-gray-200 font-bold border-b">{{ __('Created by ') }}:
                                    {{ $order->customer->name }}</p>
                                <p class="text-gray-800 dark:text-gray-200 font-bold border-b">
                                    ${{ number_format($order->product->price, 2) }}
                                </p>
                                <p class="text-gray-800 dark:text-gray-200 font-bold">{{ __('From shop') }}:
                                    {{ $order->product->shop->name }}</p>
                                <p class="text-gray-800 dark:text-gray-200 font-bold border-b">
                                    {{ __('Order placed in') }}: {{ $order->created_at }}</p>
                                <p class="text-gray-800 dark:text-gray-200 font-bold border-b">
                                    {{ __('Order Status') }}: {{ $order->status }}</p>
                                @if (Auth::user()->hasPermissionTo('deliver_orders') && Auth::id() == $order->driver_id)
                                    <span
                                        class="bg-green-100 dark:bg-green-800 text-green-800 dark:text-green-200 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">
                                        {{ __('Assigned to you, Go deliver the order') }}
                                    </span>
                                @endif
                                <form method="POST" action="{{ route('orders.updateOrderStatus') }}">
                                    @csrf
                                    <input type="hidden" name="order_id" value="{{ $order->id }}">
                                    <button type="submit" name="transition" value="approve"
                                        class="mt-2 px-4 py-2 bg-green-500 dark:bg-success hover:bg-green-700 dark:hover:bg-success-dark text-white rounded-md">Approve</button>
                                    <button type="submit" name="transition" value="reject"
                                        class="mt-2 px-4 py-2 bg-red-500 dark:bg-danger hover:bg-red-700 dark:hover:bg-danger-dark text-white rounded-md">Reject</button>
                                    <button type="submit" name="transition" value="deliver"
                                        class="mt-2 px-4 py-2 bg-yellow-500 dark:bg-warning hover:bg-yellow-700 dark:hover:bg-warning-dark text-white rounded-md">Mark
                                        as Delivered</button>
                                </form>
                                @if (Auth::user()->hasPermissionTo('deliver_orders') && $order->status == 'approved' && !$order->driver_id)
                                    <a href="{{ route('orders.assignOrderToDriver', ['orderId' => $order->id]) }}"
                                        class="mt-2 px-4 py-2 bg-purple-500 dark:bg-purple-700 text-white rounded-md inline-block text-center">Take
                                        Order</a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
</x-app-layout>
