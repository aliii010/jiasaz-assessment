<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
            {{ __('Products from ') . $shop->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-dark overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form method="GET" action="{{ route('products.getShopsProducts', $shop->id) }}">
                    <div class="flex items-center mb-4">
                        <label for="category" class="mr-2 dark:text-white">Filter by Category:</label>
                        <select name="category" id="category"
                            class="form-select mr-4 bg-white dark:bg-black dark:text-white border dark:border-gray-600 rounded">
                            <option value="">All Categories</option>
                            @foreach ($shop->categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ request('category') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        <div>
                            <button type="submit"
                                class="bg-blue-500 dark:bg-primary hover:bg-blue-700 dark:hover:bg-primary-dark text-white font-bold py-2 px-4 rounded">
                                {{ __('Filter') }}
                            </button>
                        </div>
                    </div>
                </form>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
<<<<<<< HEAD
                    @if ($products->isEmpty())
                        <div
                            class="bg-white dark:bg-black border border-gray-200 dark:border-gray-600 rounded-lg shadow-md p-4">
                            <p class="text-gray-600 dark:text-gray-300">No products found.</p>
                        </div>
                    @endif

=======
>>>>>>> ui-integration
                    @foreach ($products as $product)
                        <div
                            class="bg-white dark:bg-black border border-gray-200 dark:border-gray-600 rounded-lg shadow-md p-4 relative">
                            <img src="{{ asset('images/no-image.jpg') }}" alt="{{ $product->name }}"
                                class="w-full h-48 object-cover rounded-t-lg">
                            <h3 class="text-lg font-semibold mt-4 dark:text-white">{{ $product->name }}</h3>
                            <p class="text-gray-600 dark:text-gray-300">{{ $product->description }}</p>
                            <p class="text-gray-800 dark:text-gray-200 font-bold">
                                ${{ number_format($product->price, 2) }}</p>
                            <form action="{{ route('orders.createOrder') }}" method="POST"
                                class="absolute bottom-4 right-4">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button type="submit"
                                    class="bg-green-500 dark:bg-success hover:bg-green-700 dark:hover:bg-success-dark text-white font-bold py-2 px-4 rounded">
                                    {{ __('Order') }}
                                </button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
