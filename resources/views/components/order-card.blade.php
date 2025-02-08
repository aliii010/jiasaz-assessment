@props(['order', 'customerName'])

<div
    class="max-w-[19rem] w-full bg-white shadow-[4px_6px_10px_-3px_#bfc9d4] rounded border border-[#e0e6ed] dark:border-[#1b2e4b] dark:bg-[#191e3a] dark:shadow-none">
    <div class="py-7 px-6">
        <div class="-mt-7 mb-7 -mx-6 rounded-tl rounded-tr h-[215px] overflow-hidden">
            <img src={{ asset('images/no-image.jpg') }} alt="image" class="w-full h-full object-cover" />
        </div>
        <h5 class="text-[#3b3f5c] text-xl font-semibold mb-4 dark:text-white-light">
            {{ $order->product->name }}
        </h5>
        <p class="text-white-dark mb-4">{{ $order->product->description }}</p>

        @isset($customerName)
            <div class="flex items-center mb-4 gap-2">
                <x-icons.user width="24" height="24" />

                <p class="text-gray-800 dark:text-gray-200 font-bold">{{ $customerName }}</p>
            </div>
        @endisset

        <div class="flex items-center mb-4 gap-2">
            <x-icons.price-tag width="24" height="24" />

            <p class="text-gray-800 dark:text-gray-200 font-bold">
                ${{ number_format($order->product->price, 2) }}
            </p>
        </div>
        <div class="flex items-center mb-4 gap-2">
            <x-icons.calendar width="24" height="24" />


            <p class="text-gray-800 dark:text-gray-200 font-bold">
                {{ $order->created_at }}</p>
        </div>
        <div class="flex items-center mb-4 gap-2">
            <x-icons.status width="24" height="24" />

            <p class="text-gray-800 dark:text-gray-200 font-bold">
                {{ $order->status }}</p>
        </div>
        <div class="flex items-center mb-4 gap-2">
            <div class="flex items-center mb-4 gap-2">
                <x-icons.shop width="24" height="24" />

                <p class="text-gray-800 dark:text-gray-200 font-bold">
                    {{ $order->product->shop->name }}</p>
            </div>

        </div>

        {{ $slot }}

    </div>
</div>
