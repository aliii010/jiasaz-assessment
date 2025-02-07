<x-app-layout>
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($shops as $shop)
                <div class="bg-white dark:bg-black rounded-lg shadow-md overflow-hidden">
                    <a href="{{ route('products.getShopsProducts', $shop->id) }}">
                        <img src="{{ asset('storage/' . $shop->image) }}" alt="{{ $shop->name }}"
                            class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $shop->name }}</h3>
                            <p class="text-gray-600 dark:text-gray-300">{{ $shop->address }}</p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
