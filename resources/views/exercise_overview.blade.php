<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl dark:text-white leading-tight">
            {{ __('Exercises') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 mb-6">
            <div class="bg-gray-100 dark:bg-gray-800 p-4 sm:p-8 shadow sm:rounded-lg grow">
                <div class="text-gray-600 dark:text-gray-400">
                    <form method="get" action="{{ route('exercise.index') }}">
                        @csrf
                        @method('get')

                        <div class="mb-6">
                            <x-input-label for="query" class="text-gray-900 text-gray-900 dark:text-white" :value="__('Search')" />
                            <x-text-input id="query" name="query" type="search" class="mt-1 block w-full" :value="old('search', request('query'))" autofocus autocomplete="search" />
                            <x-input-error class="mt-2" :messages="$errors->get('query')" />
                        </div>

                        <div class="mt-6 flex justify-end">
                            <a href="{{ route('exercise.index') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150"> Clear search </a>
                            <div class="flex items-center gap-4 ml-3">
                                <x-primary-button>{{ __('Search') }}</x-primary-button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="bg-gray-100 dark:bg-gray-800 p-4 sm:p-8 shadow sm:rounded-lg grow">
                <div class="text-gray-600 dark:text-gray-400">
                    <div class="pr-6" name="weights">
                        @include('.profile.partials.exercise-grid')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
