<section>
    <header>
        <div class="header-div">
            <div class="title">
                <h2 class="text-lg g-white text-gray-900 dark:text-white flex">
                    Exercises in {{ $workout->name }}
                </h2>
        
                <p class="mt-1 text-sm text-gray-600 mb-6 flex">
                    {{ __("All exercises in your workout") }}
                </p>
            </div>
            <div class="button_container">
                <x-primary-button
                    class="mt-3 mb-6"
                    x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'add-exercise-to-workout')"
                >{{ __('Add exercise') }}</x-primary-button>
            </div>
        </div>
        <x-modal id="test" class="modal-dialog modal-lg" size="xl" name="add-exercise-to-workout" focusable>
            <h2 class="text-lg font-medium px-6 pt-6 text-gray-900 dark:text-white">Exercises</h2>

            <p class="mt-1 text-sm text-gray-600 px-6 mb-6">
                {{ __('Add exercises to your workout') }}
            </p>

            @include('profile.partials.workout-exercise-grid-modal')

        </x-modal>
    </header>
    <div class="exercise-grid">
        @foreach ($workout_exercise as $e)
            <a href="{{ url('exercise/' . $e->id)}}">
                <div class="exercise-grid-child p-4 sm:p-8 shadow sm:rounded-lg">
                    <p class="text-gray-900 dark:text-white">{{ $e->name }}</p>
                    <br>
                    <p>{{ $e->description }}</p>
                </div>
            </a>
        @endforeach
    </div>
</section>
