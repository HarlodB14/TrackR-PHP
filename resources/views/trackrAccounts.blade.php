<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('TrackR Accounts') }}
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

                    <div class="mb-8">
                        <a href="{{ route('create-account') }}"
                           class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Create New Account
                        </a>
                    </div>

                    <table class="w-full bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <!-- Table headers -->
                        <thead>
                        <tr>
                            <th class="py-2 px-4 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 font-semibold text-left">Name</th>
                            <th class="py-2 px-4 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 font-semibold text-left">Email</th>
                            <th class="py-2 px-4 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 font-semibold text-left">Role</th>
                        </tr>
                        </thead>
                        <!-- Table data -->
                        <tbody>
                        @foreach($accounts as $account)
                            <tr>
                                <td class="py-2 px-4 border-b dark:border-gray-700">{{ $account->name }}</td>
                                <td class="py-2 px-4 border-b dark:border-gray-700">{{ $account->email }}</td>
                                <td class="py-2 px-4 border-b dark:border-gray-700">{{ $account->role }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
