<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl dark:text-white leading-tight">
            Exercises > {{ $exercise->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 mb-6">
            <div class="bg-gray-100 dark:bg-gray-800 p-4 sm:p-8 shadow sm:rounded-lg grow">
                <div class="text-gray-600 dark:text-gray-400">
                    {{ $exercise->description }}
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
