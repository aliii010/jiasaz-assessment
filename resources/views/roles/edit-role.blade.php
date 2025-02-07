<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-black overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-white">
                    <x-input-text title="Update Role:" name="name" label="Enter new role name" method="PATCH"
                        buttonName="Update Role" action="{{ route('roles.update', $role->id) }}"
                        oldValue="{{ $role->name }}" class="space-y-4" />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
