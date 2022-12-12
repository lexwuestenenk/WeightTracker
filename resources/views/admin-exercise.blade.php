<x-admin>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="admin-card">
            <div class="admin-card-left">
                <div class="text-gray-600 dark:text-gray-400">
                    Total exercises: {{ count( $exercise_count )}}
                </div>
            </div>
            <div class="admin-card-right">
                <x-primary-button
                    class="mt-3 mb-6"
                    style="height: 2rem;"
                    x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'create-new-exercise')"
                >{{ __('Create new exercise') }}</x-primary-button>
            </div>
        </div>
        <div class="admin-card">
            <div class="bg-gray-100 dark:bg-gray-800 p-4 sm:p-8 shadow sm:rounded-lg grow">
                <div class="text-gray-600 dark:text-gray-400">
                    @include('profile.partials.exercise-grid')
                </div>
            </div>
        </div>
    </div>
    @include('profile.partials.create-new-exercise-form')
</x-admin>

