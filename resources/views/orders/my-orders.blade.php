<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Orders') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">

                <div class="mb-4">
                    <form method="GET" action="{{ route('orders.showCustomerOrders') }}">
                        <label for="status" class="block text-sm font-medium text-gray-700">Filter by Status</label>
                        <select id="status" name="status" class="form-select mr-4">
                            <option value="">All</option>
                            @foreach ($statuses as $status)
                                <option value="{{ $status->id }}"
                                    {{ request('status') == $status->id ? 'selected' : '' }}>
                                    {{ $status->status }}
                                </option>
                            @endforeach
                        </select>
                        <button type="submit" class="mt-2 px-4 py-2 bg-blue-500 text-white rounded-md">Filter</button>
                    </form>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @if ($orders->isEmpty())
                        <div class="bg-white border border-gray-200 rounded-lg shadow-md p-4 relative">
                            <p class="text-gray-800 font-bold">{{ __('No orders found') }}</p>
                        </div>
                    @endif

                    @foreach ($orders as $order)
                        <div class="bg-white border border-gray-200 rounded-lg shadow-md p-4 relative">
                            <img src="{{ asset('images/no-image.jpg') }}" alt="{{ $order->product->name }}"
                                class="w-full h-48 object-cover rounded-t-lg">
                            <div class="p-4">
                                <h3 class="text-lg font-semibold mt-4">{{ $order->product->name }}</h3>
                                <p class="text-gray-600">{{ $order->product->description }}</p>
                                <p class="text-gray-800 font-bold">${{ number_format($order->product->price, 2) }}
                                </p>
                                <p class="text-gray-800 font-bold">{{ __('Order placed in') }}:
                                    {{ $order->created_at }}
                                </p>
                                <p class="text-gray-800 font-bold">{{ __('Order Status') }}:
                                    {{ $order->status->status }}
                                </p>
                                <p class="text-gray-800 font-bold">{{ __('From shop') }}:
                                    {{ $order->product->shop->name }}</p>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
