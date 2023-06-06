<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create a new TrackR-account') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (session('success'))
                        <div class="bg-green-500 text-white font-bold py-2 px-4 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif
                    <h3 class="text-lg font-bold mb-4">TrackR-Account Details</h3>
                    <form action="{{ route('account.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">
                                Name:
                            </label>
                            <input type="text" name="name" id="name"
                                   class="border border-gray-300 dark:border-gray-700 rounded-md p-2 text-black"
                                   required>
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">
                                Email:
                            </label>
                            <input type="email" name="email" id="email"
                                   class="border border-gray-300 dark:border-gray-700 rounded-md p-2 text-black"
                                   required>
                        </div>
                        <div class="mb-4">
                            <label for="password" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">
                                Password:
                            </label>
                            <input type="password" name="password" id="password"
                                   class="border border-gray-300 dark:border-gray-700 rounded-md p-2 text-black"
                                   required>
                        </div>
                        <div class="mb-4">
                            <label for="role" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">
                                Role:
                            </label>
                            <select name="role" id="role" class="border border-gray-300 dark:border-gray-700 rounded-md p-2 text-black" required>
                                @foreach($roles as $role)
                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex sm:justify-start">
                            <button type="submit"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Create Account
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
