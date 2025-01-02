<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6" style="background-color: #ffcccc;">
                <h2 class="text-2xl font-semibold text-gray-800 leading-tight" style="color: #cc0000;">
                    {{ __('Order Failed') }}
                </h2>
                <p class="text-gray-600 mt-4" style="color: #cc0000;">
                    {{ $message }}
                </p>
            </div>
        </div>
    </div>
</x-app-layout>
