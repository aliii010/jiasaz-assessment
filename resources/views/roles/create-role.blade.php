<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <x-input-text title="Create Role:" name="name" label="Enter role name" method="POST" buttonName="Create Role"
                action="{{ route('roles.store') }}" class="space-y-4" />


        </div>
    </div>
</x-app-layout>
