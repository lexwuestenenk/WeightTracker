\<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 mb-6 ">
            <div class="p-4 sm:p-8 bg-gray-100 dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl text-gray-600 dark:text-gray-400">
                    @include('.profile.partials.update-profile-health-information-form')
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 mb-6">
            <div class="p-4 sm:p-8 bg-gray-100 dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="w-full">
                    <div class="w-full text-gray-600 dark:text-gray-400">
                        @include('.profile.partials.weight-logs')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
