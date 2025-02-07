<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-black shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-white">
                    <x-input-text title="Create Permission:" name="name" label="Enter permission name" method="POST"
                        buttonName="Create Permission" action="{{ route('permissions.store') }}" class="space-y-4" />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
