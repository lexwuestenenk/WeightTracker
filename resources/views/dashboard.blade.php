<x-app-layout>
    <head>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </head>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 mb-6">
            <div class="bg-gray-100 dark:bg-gray-800 p-4 sm:p-8 shadow sm:rounded-lg grow">
                <div class="weight-chart max-w-xl text-gray-600 dark:text-gray-400">
                    @include('.charts.weight-chart')
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 mb-6">
            <div class="bg-gray-100 dark:bg-gray-800 p-4 sm:p-8 shadow sm:rounded-lg grow">
                <div class="weight-chart max-w-xl text-gray-600 dark:text-gray-400">
                    @include('.charts.bmi-chart')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
