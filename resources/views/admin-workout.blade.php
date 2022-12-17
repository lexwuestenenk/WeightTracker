<x-admin>
    <head>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </head>
    <x-slot name="header">
        <h2 class="font-semibold text-xl dark:text-white leading-tight">
            {{ __('Admin > Workouts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="admin-card">
            <div class="admin-card-left">
                <div class="text-gray-600 dark:text-gray-400">
                    Total workouts: {{ count( $workout )}}
                </div>
            </div>
        </div>
        <div class="admin-card">
            @include('charts.workout-chart')
        </div>
    </div>
</x-admin>

