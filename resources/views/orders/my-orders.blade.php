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
                        <x-order-card :order="$order" />
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
