<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-dark overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h3 class="text-lg font-medium text-gray-900 dark:text-white">{{ $user->name }}</h3>
                <form action="{{ route('users.updateRoles', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mt-4">
                        @foreach ($roles as $role)
                            <div class="flex items-center">
                                <input type="checkbox" name="roles[]" value="{{ $role->name }}"
                                    {{ $user->roles->contains($role) ? 'checked' : '' }}
                                    class="form-checkbox h-4 w-4 text-primary border-dark dark:border-dark-light transition duration-150 ease-in-out">
                                <label for="role-{{ $role->id }}"
                                    class="ml-2 block text-sm leading-5 text-gray-900 dark:text-white">
                                    {{ $role->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    <div class="mt-6">
                        <button type="submit"
                            class="px-4 py-2 bg-primary dark:bg-primary-dark text-white rounded-md hover:bg-primary-light dark:hover:bg-primary">
                            {{ __('Update Roles') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
