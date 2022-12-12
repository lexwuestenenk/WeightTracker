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
        <div class="admin-card">
            <div class="admin-card-left">
                <div class="text-gray-600 dark:text-gray-400">
                    Total users: {{ count( $user_count )}}
                </div>
            </div>
            <div class="admin-card-right">
                <x-primary-button
                    class="mt-3 mb-6"
                    style="height: 2rem;"
                    x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'create-new-user')"
                >{{ __('Create new user') }}</x-primary-button>
            </div>
        </div>
        <div class="admin-card">
            @include('charts.user-chart')
        </div>
        <div class="admin-card">
            @include('profile.partials.users')
        </div>
    </div>
    @include('profile.partials.create-new-user-form')
</x-admin-layout>

