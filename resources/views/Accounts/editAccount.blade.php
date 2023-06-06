<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Account') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 space-y-4">
                    @if(session('success'))
                        <div class="bg-green-500 text-white font-bold py-2 px-4 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('account.edit', $user) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 dark:text-gray-200 font-bold mb-2">
                                Name:
                            </label>
                            <input type="text" id="name" name="name" value="{{ $user->name }}" class="border border-gray-300 dark:border-gray-700 rounded-md p-2 w-full" required autofocus>
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 dark:text-gray-200 font-bold mb-2">
                                Email:
                            </label>
                            <input type="email" id="email" name="email" value="{{ $user->email }}" class="border border-gray-300 dark:border-gray-700 rounded-md p-2 w-full" required>
                        </div>

                        <div class="mb-4">
                            <label for="password" class="block text-gray-700 dark:text-gray-200 font-bold mb-2">
                                Password:
                            </label>
                            <input type="password" id="password" name="password" class="border border-gray-300 dark:border-gray-700 rounded-md p-2 w-full">
                            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Leave blank to keep the existing password.</p>
                        </div>

                        <div class="mb-4">
                            <label for="role" class="block text-gray-700 dark:text-gray-200 font-bold mb-2">
                                Role:
                            </label>
                            <select id="role" name="role" class="border border-gray-300 dark:border-gray-700 rounded-md p-2 w-full" required>
                                @foreach($roles as $role)
                                    <option value="{{ $role->name }}" {{ $user->hasRole($role) ? 'selected' : '' }}>
                                        {{ $role->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Update Account
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
