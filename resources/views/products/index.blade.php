<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products from ') . $shop->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form method="GET" action="{{ route('products.getShopsProducts', $shop->id) }}">
                    <div class="flex items-center mb-4">
                        <label for="category" class="mr-2">Filter by Category:</label>
                        <select name="category" id="category" class="form-select mr-4">
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
                                class="btn btn-primary bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                {{ __('Filter') }}
                            </button>
                        </div>
                    </div>
                </form>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($products as $product)
                        <div class="bg-white border border-gray-200 rounded-lg shadow-md p-4">
                            <img src="{{ asset('images/no-image.jpg') }}" alt="{{ $product->name }}"
                                class="w-full h-48 object-cover rounded-t-lg">
                            <h3 class="text-lg font-semibold mt-4">{{ $product->name }}</h3>
                            <p class="text-gray-600">{{ $product->description }}</p>
                            <p class="text-gray-800 font-bold">${{ number_format($product->price, 2) }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
