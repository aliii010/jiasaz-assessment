<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-dark shadow-xl sm:rounded-lg p-6">
                <h3 class="text-lg font-medium text-gray-900 dark:text-white">{{ __('Assign Permissions') }}</h3>
                <ul>
                    @foreach ($permissions as $permission)
                        <li
                            class="permission-item p-2 rounded-lg transition duration-300 
                            {{ $role->hasPermissionTo($permission->name) ? 'bg-success-light dark:bg-success-dark-light' : 'bg-primary-light dark:bg-primary-dark-light' }}">
                            <span class="text-gray-900 dark:text-white">{{ $permission->name }}</span>
                            <form
                                action="{{ $role->hasPermissionTo($permission->name) ? route('roles.revoke-permission', [$role->id, $permission->id]) : route('roles.assign-permission', [$role->id, $permission->id]) }}"
                                method="POST" class="inline">
                                @csrf
                                <button type="submit" class="ml-2 text-sm text-blue-500 dark:text-info">
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
