<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <x-input-text title="Update Role:" name="name" label="Enter new role name" method="PATCH"
                buttonName="Update Role" action="{{ route('roles.update', $role->id) }}" oldValue="{{ $role->name }}"
                class="space-y-4" />

        </div>
    </div>
</x-app-layout>
