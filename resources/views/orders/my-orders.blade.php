<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
            {{ __('My Orders') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-black overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="mb-4">
                    <form method="GET" action="{{ route('orders.showCustomerOrders') }}">
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
                        <button type="submit" class="btn btn-primary mt-4">Filter</button>
                    </form>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @if ($orders->isEmpty())
                        <div
                            class="bg-white dark:bg-dark border border-gray-200 dark:border-gray-600 rounded-lg shadow-md p-4 relative">
                            <p class="text-gray-800 dark:text-gray-200 font-bold">{{ __('No orders found') }}</p>
                        </div>
                    @endif

                    @foreach ($orders as $order)
                        <div
                            class="max-w-[19rem] w-full bg-white shadow-[4px_6px_10px_-3px_#bfc9d4] rounded border border-[#e0e6ed] dark:border-[#1b2e4b] dark:bg-[#191e3a] dark:shadow-none">
                            <div class="py-7 px-6">
                                <div class="-mt-7 mb-7 -mx-6 rounded-tl rounded-tr h-[215px] overflow-hidden">
                                    <img src={{ asset('images/no-image.jpg') }} alt="image"
                                        class="w-full h-full object-cover" />
                                </div>
                                <h5 class="text-[#3b3f5c] text-xl font-semibold mb-4 dark:text-white-light">
                                    {{ $order->product->name }}
                                </h5>
                                <p class="text-white-dark mb-4">{{ $order->product->description }}</p>
                                <p class="text-gray-800 dark:text-gray-200 font-bold">Price:
                                    ${{ number_format($order->product->price, 2) }}</p>
                                <p class="text-gray-800 dark:text-gray-200 font-bold">{{ __('Order placed in') }}:
                                    {{ $order->created_at }}</p>
                                <p class="text-gray-800 dark:text-gray-200 font-bold">{{ __('Order Status') }}:
                                    {{ $order->status }}</p>
                                <p class="text-gray-800 dark:text-gray-200 font-bold">{{ __('From shop') }}:
                                    {{ $order->product->shop->name }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
