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
                <div class="exercise-grid-child shadow sm:rounded-lg">
                    <a href="{{ url('workout/' . $e->id)}}">
                        <div style="height:80%; width: 100%;">
                            <p class="text-gray-900 dark:text-white px-6 pt-6">{{ $e->name }}</p>
                            <br>
                            <p class="px-6">{{ $e->description }}</p>
                        </div>
                    </a>
                    <div class="flex flex-row justify-end pr-6" style="height:20%; width: 100%;">
                            <!-- Delete workout using the workout.delete route 
                            This function opens up a modal that asks the user to verify
                            they want to delete the workout -->
                        <x-primary-button
                            class="mt-3 mb-3"
                            x-data=""
                            x-on:click.prevent="$dispatch('open-modal', 'delete-workout-{{ $e->id }}')"
                        ><i class="fa-solid fa-trash-can"></i></x-primary-button>
            
                        <x-modal name="delete-workout-{{ $e->id }}" focusable>
                            <h2 class="text-lg font-medium px-6 pt-6 text-gray-900 dark:text-white">Are you sure you want to delete this exercise from {{ $workout->name }}?</h2>
                
                            <p class="mt-1 text-sm text-gray-600 px-6">
                                {{ $e->name }}
                            </p>

                            <!-- Form used to create new workouts -->
                            <form method="post" action="{{ route('exercise_workouts.destroy') }}" class="p-6">
                                @csrf
                                @method('delete')
                
                                <div class="mb-6">
                                    <x-text-input id="exercise_id" name="exercise_id" type="hidden" class="mt-1 block w-full" :value="old('exercise_id', $e->id)" required autofocus autocomplete="exercise_id" />
                                    <x-text-input id="workout_id" name="workout_id" type="hidden" class="mt-1 block w-full" :value="old('workout_id', $workout->id)" required autofocus autocomplete="workout_id" />
                                </div>
                
                                <div class="mt-6 flex justify-end">
                                    <x-secondary-button x-on:click="$dispatch('close')">
                                        {{ __('Cancel') }}
                                    </x-secondary-button>
                                    <div class="flex items-center gap-4 ml-3">
                                        <x-primary-button>{{ __('Delete exercise') }}</x-primary-button>
                                    </div>
                                </div>
                            </form>
                        </x-modal>
                    </div>
                </div>
        @endforeach
    </div>
</section>
