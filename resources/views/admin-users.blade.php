<x-admin>
    <head>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </head>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="admin-card max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 mb-6 ">
            <div class="p-4 sm:p-8 bg-gray-100 dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="text-gray-600 dark:text-gray-400">
                    Total users: {{ count($users) }}
                </div>
            </div>
        </div>
        <div class="admin-card max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 mb-6 ">
            <div class="p-4 sm:p-8 bg-gray-100 dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="text-gray-600 dark:text-gray-400">
                    @include('charts.user-chart')
                </div>
            </div>
        </div>
        <div class="admin-card max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 mb-6 ">
            <div class="p-4 sm:p-8 bg-gray-100 dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="text-gray-600 dark:text-gray-400">
                    @include('profile.partials.users')
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>

