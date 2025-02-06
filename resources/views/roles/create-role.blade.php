<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-dark overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-white">
                    <form action="{{ route('roles.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="name"
                                class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Role Name:</label>
                            <input type="text" name="name" id="name"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-white dark:bg-gray-800 leading-tight focus:outline-none focus:shadow-outline"
                                required>
                        </div>
                        <div class="flex items-center justify-between">
                            <button type="submit"
                                class="bg-primary dark:bg-primary-dark hover:bg-primary-light dark:hover:bg-primary text-white font-bold py-2 px-4 rounded">
                                Create Role
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
