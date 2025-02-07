<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
            {{ __('Products from ') . $shop->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-black overflow-hidden shadow-xl sm:rounded-lg p-6">
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
                    @if ($products->isEmpty())
                        <div
                            class="bg-white dark:bg-black border border-gray-200 dark:border-gray-600 rounded-lg shadow-md p-4">
                            <p class="text-gray-600 dark:text-gray-300">No products found.</p>
                        </div>
                    @endif

                    @foreach ($products as $product)
                        <div
                            class="max-w-[19rem] w-full bg-white shadow-[4px_6px_10px_-3px_#bfc9d4] rounded border border-[#e0e6ed] dark:border-[#1b2e4b] dark:bg-[#191e3a] dark:shadow-none">
                            <div class="py-7 px-6">
                                <div class="-mt-7 mb-7 -mx-6 rounded-tl rounded-tr h-[215px] overflow-hidden">
                                    <img src="{{ asset('images/no-image.jpg') }}" alt="image"
                                        class="w-full h-full object-cover" />
                                </div>
                                <h5 class="text-[#3b3f5c] text-xl font-semibold mb-4 dark:text-white-light">
                                    {{ $product->name }}
                                </h5>
                                <p class="text-white-dark">{{ $product->description }}</p>
                                <p class="text-gray-800 dark:text-gray-200 text-lg font-semibold mt-4">
                                    ${{ number_format($product->price, 2) }}
                                </p>
                                <form action="{{ route('orders.createOrder') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <button type="submit" class="btn btn-primary mt-6">
                                        {{ __('Order') }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
