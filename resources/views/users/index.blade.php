<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-black shadow-sm sm:rounded-lg overflow-hidden">
                <div class="p-6 bg-white dark:bg-black border-b border-gray-200 dark:border-gray-700">
                    <form method="GET" action="{{ route('users.index') }}">
                        <div class="flex items-center mb-4 space-x-4">
                            <div>
                                <select name="role"
                                    class="form-select block w-full p-2 rounded-md bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-white border border-gray-300 dark:border-gray-600">
                                    <option value="">{{ __('All Roles') }}</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->name }}"
                                            {{ request('role') == $role->name ? 'selected' : '' }}>
                                            {{ $role->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary font-bold py-2 px-4 rounded">
                                    {{ __('Filter') }}
                                </button>
                            </div>
                        </div>
                    </form>

                    <div class="overflow-x-auto">
                        <table class="min-w-full border border-gray-300 dark:border-gray-700 rounded-lg">
                            <thead>
                                <tr class="bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-white">
                                    <th class="py-3 px-4 border-b text-center">{{ __('Name') }}</th>
                                    <th class="py-3 px-4 border-b text-center">{{ __('Email') }}</th>
                                    <th class="py-3 px-4 border-b text-center">{{ __('Role') }}</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-300 dark:divide-gray-700">
                                @if ($users->isEmpty())
                                    <tr>
                                        <td class="py-3 px-4 border-b text-center text-gray-600 dark:text-gray-300"
                                            colspan="3">
                                            {{ __('No users found') }}
                                        </td>
                                    </tr>
                                @endif
                                @foreach ($users as $user)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 transition">
                                        <td class="py-3 px-4 border-b text-center text-gray-900 dark:text-white">
                                            {{ $user->name }}</td>
                                        <td class="py-3 px-4 border-b text-center text-gray-900 dark:text-white">
                                            {{ $user->email }}</td>
                                        <td class="py-3 px-4 border-b text-center text-gray-900 dark:text-white">
                                            @if ($user->roles->isEmpty())
                                                <span>-</span>
                                            @else
                                                {{ $user->roles->pluck('name')->join(', ') }}
                                            @endif
                                            <a href="{{ route('users.showUserRoles', $user->id) }}"
                                                class="ml-2 text-blue-500 dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-300">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
