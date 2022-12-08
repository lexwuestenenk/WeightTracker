<section>
    <header>
        <h2 class="text-lg g-white text-gray-900 dark:text-white">
            {{ __('Workouts') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 mb-6">
            {{ __("All your workouts") }}
        </p>

        <!-- Form used to create new workouts -->
        <form method="post" action="{{ route('workout.create') }}" class="mt-6 space-y-6 mb-6">
            @csrf
            @method('post')

            <div>
                <x-input-label for="name" class="text-gray-900 dark:text-white" :value="__('Workout Name')" />
                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" required autofocus autocomplete="name" />
                <x-input-error class="mt-2" :messages="$errors->get('Workout Name')" />
            </div>

            <div>
                <x-input-label for="description" class="text-gray-900 dark:text-white" :value="__('Workout Description')" />
                <x-text-input id="description" name="description" type="text" class="mt-1 block w-full" required autofocus autocomplete="description" />
                <x-input-error class="mt-2" :messages="$errors->get('Workout Description')" />
            </div>

            <div class="flex items-center gap-4">
                <x-primary-button>{{ __('Create new workout') }}</x-primary-button>
            </div>
        </form>

        <div class="exercise-grid">
            @foreach ($workout as $w)
                <a href="{{ url('workout/' . $w->id)}}">
                    <div class="exercise-grid-child p-4 sm:p-8 shadow sm:rounded-lg">
                        <p class="text-gray-900 dark:text-white">{{ $w->name }}</p>
                        <br>
                        <p>{{ $w->description }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </header>
</section>
