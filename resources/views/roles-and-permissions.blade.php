<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Roles & Permissions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-4 flex space-x-2">
                <a href="{{ route('roles.create') }}"
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    Create a new role +
                </a>
                <a href="{{ route('permissions.create') }}"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Add a new permission +
                </a>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <!-- Roles Section -->
                <div>
                    <h3 class="text-xl font-semibold mb-4">Roles</h3>
                    @if ($roles->isEmpty())
                        <p class="text-center text-gray-500">No roles available.</p>
                    @else
                        @foreach ($roles as $role)
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                                <div class="p-6 text-gray-900">
                                    <div class="flex justify-between items-center">
                                        <div>
                                            <h2 class="text-2xl font-bold">{{ $role->name }}</h2>
                                        </div>
                                        <div class="flex space-x-2">
                                            <a href="{{ route('roles.edit', $role->id) }}"
                                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit
                                            </a>
                                            <a href="{{ route('roles.permissions', $role->id) }}"
                                                class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                                                Permissions
                                            </a>
                                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
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
                    <h3 class="text-xl font-semibold mb-4">Permissions</h3>
                    @if ($permissions->isEmpty())
                        <p class="text-center text-gray-500">No permissions available.</p>
                    @else
                        @foreach ($permissions as $permission)
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                                <div class="p-6 text-gray-900">
                                    <div class="flex justify-between items-center">
                                        <div>
                                            <h2 class="text-2xl font-bold">{{ $permission->name }}</h2>
                                        </div>
                                        <div class="flex space-x-2">
                                            <a href="{{ route('permissions.edit', $permission->id) }}"
                                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                                            <form action="{{ route('permissions.destroy', $permission->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
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
