<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Assign permission to role') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h3 class="text-lg font-medium text-gray-900">{{ __('Assign Permissions') }}</h3>
                <ul>
                    @foreach ($permissions as $permission)
                        <li
                            class="permission-item {{ $role->hasPermissionTo($permission->name) ? 'bg-green-200' : '' }}">
                            {{ $permission->name }}
                            <form
                                action="{{ $role->hasPermissionTo($permission->name) ? route('roles.revoke-permission', [$role->id, $permission->id]) : route('roles.assign-permission', [$role->id, $permission->id]) }}"
                                method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="ml-2 text-sm text-blue-500">
                                    {{ $role->hasPermissionTo($permission->name) ? __('Revoke') : __('Assign') }}
                                </button>
                            </form>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
