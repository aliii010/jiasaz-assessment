<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-dark overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-white">
                    <form action="{{ route('permissions.update', $permission->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 dark:text-white text-sm font-bold mb-2">
                                Permission Name:
                            </label>
                            <input type="text" name="name" id="name" value="{{ $permission->name }}"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-white dark:bg-gray-800 leading-tight focus:outline-none focus:shadow-outline"
                                required>
                        </div>
                        <div class="flex items-center justify-between">
                            <button type="submit"
                                class="bg-blue-500 dark:bg-primary hover:bg-blue-700 dark:hover:bg-primary-dark text-white font-bold py-2 px-4 rounded">
                                Update Permission
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
