<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-4 flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-2">
                <a href="{{ route('roles.create') }}" class="btn btn-success">
                    Create a new role +
                </a>
                <a href="{{ route('permissions.create') }}" class="btn btn-primary">
                    Add a new permission +
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Roles Section -->
                <div>
                    <h3 class="text-xl font-semibold mb-4 dark:text-white">Roles</h3>
                    @if ($roles->isEmpty())
                        <p class="text-center text-gray-500 dark:text-gray-400">No roles available.</p>
                    @else
                        @foreach ($roles as $role)
                            <div class="bg-white dark:bg-black overflow-hidden shadow-sm sm:rounded-lg mb-4">
                                <div class="p-6 text-gray-900 dark:text-white">
                                    <div class="flex flex-col sm:flex-row justify-between items-center">
                                        <div>
                                            <h2 class="text-2xl font-bold">{{ $role->name }}</h2>
                                        </div>
                                        <div class="flex space-x-2 mt-2 sm:mt-0">
                                            <a href="{{ route('roles.edit', $role->id) }}"
                                                class="btn btn-secondary">Edit
                                            </a>
                                            <a href="{{ route('roles.permissions', $role->id) }}"
                                                class="btn btn-warning">
                                                Permissions
                                            </a>
                                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>

                <!-- Permissions Section -->
                <div>
                    <h3 class="text-xl font-semibold mb-4 dark:text-white">Permissions</h3>
                    @if ($permissions->isEmpty())
                        <p class="text-center text-gray-500 dark:text-gray-400">No permissions available.</p>
                    @else
                        @foreach ($permissions as $permission)
                            <div class="bg-white dark:bg-black overflow-hidden shadow-sm sm:rounded-lg mb-4">
                                <div class="p-6 text-gray-900 dark:text-white">
                                    <div class="flex flex-col sm:flex-row justify-between items-center">
                                        <div>
                                            <h2 class="text-2xl font-bold">{{ $permission->name }}</h2>
                                        </div>
                                        <div class="flex space-x-2 mt-2 sm:mt-0">
                                            <a href="{{ route('permissions.edit', $permission->id) }}"
                                                class="btn btn-secondary">Edit</a>
                                            <form action="{{ route('permissions.destroy', $permission->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
