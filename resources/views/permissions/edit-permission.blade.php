<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-input-text title="Update Permission:" name="name" label="Enter new permission name" method="PATCH"
                buttonName="Update Permission" action="{{ route('permissions.update', $permission->id) }}"
                class="space-y-4" />
        </div>
    </div>
</x-app-layout>
