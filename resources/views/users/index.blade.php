<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="GET" action="{{ route('users.index') }}">
                        <div class="flex items-center mb-4">
                            <div class="mr-4">
                                <select name="role" class="form-select block w-full mt-1">
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
                                <button type="submit"
                                    class="btn btn-primary bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    {{ __('Filter') }}
                                </button>
                            </div>
                        </div>
                    </form>

                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-gray-200">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="py-2 px-4 border-b">{{ __('Name') }}</th>
                                    <th class="py-2 px-4 border-b">{{ __('Email') }}</th>
                                    <th class="py-2 px-4 border-b">{{ __('Role') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($users->isEmpty())
                                    <tr>
                                        <td class="py-2 px-4 border-b text-center" colspan="3">
                                            {{ __('No users found') }}
                                        </td>
                                    </tr>
                                @endif
                                @foreach ($users as $user)
                                    <tr class="hover:bg-gray-50">
                                        <td class="py-2 px-4 border-b text-center">{{ $user->name }}</td>
                                        <td class="py-2 px-4 border-b text-center">{{ $user->email }}</td>
                                        <td class="py-2 px-4 border-b text-center">
                                            @if ($user->roles->isEmpty())
                                                <span>-</span>
                                            @else
                                                {{ $user->roles->pluck('name')->join(', ') }}
                                            @endif
                                            <a href="{{ route('users.showUserRoles', $user->id) }}"
                                                class="ml-2 text-blue-500 hover:text-blue-700">
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
