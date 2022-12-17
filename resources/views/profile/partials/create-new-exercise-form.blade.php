<x-modal name="create-new-exercise" focusable>
    <h2 class="text-lg font-medium px-6 pt-6 text-gray-900 dark:text-white">Create a new workout</h2>

    <p class="mt-1 text-sm text-gray-600 px-6">
        {{ __('Create a new exercise') }}
    </p>

    <!-- Form used to create new workouts -->
    <form method="post" action="{{ route('admin-exercises.create') }}" class="p-6" enctype="multipart/form-data">
        @csrf
        @method('post')

        <div class="mb-6">
            <x-input-label for="name" class="text-gray-900 text-gray-900 dark:text-white" :value="__('Exercise Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="description" class="text-gray-900 text-gray-900 dark:text-white" :value="__('Exercise Description')" />
            <x-text-input id="description" name="description" type="text" class="mt-1 block w-full" required autofocus autocomplete="description" />
            <x-input-error class="mt-2" :messages="$errors->get('description')" />
        </div>

        <div>
            <x-input-label for="image" class="text-gray-900 text-gray-900 dark:text-white" :value="__('Exercise Image')" />
            <x-text-input id="image" name="image" type="file" class="mt-1 block w-full" required autofocus autocomplete="image" />
            <x-input-error class="mt-2" :messages="$errors->get('image')" />
        </div>

        <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Cancel') }}
            </x-secondary-button>
            <div class="flex items-center gap-4 ml-3">
                <x-primary-button>{{ __('Create new exercise') }}</x-primary-button>
            </div>
        </div>
    </form>
</x-modal>