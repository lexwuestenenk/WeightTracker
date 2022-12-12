<section>
    <div class="exercise-grid p-6">
        @foreach ($exercise as $e)
            <div class="exercise-grid-child shadow sm:rounded-lg mb-6">
                <a href="{{ url('exercise/' . $e->id)}}">
                    <div style="height:80%; width: 100%;">
                        <p class="text-gray-900 dark:text-white px-6 pt-6">{{ $e->name }}</p>
                        <br>
                        <p class="px-6">{{ $e->description }}</p>
                    </div>
                </a>
                <div class="flex flex-row justify-end pr-6" style="height:20%; width: 100%;">
                    <form method="post" action="{{ route('exercise_workouts.create') }}">
                        @csrf
                        @method('post')

                        <x-text-input id="exercise_id" name="exercise_id" type="hidden" class="mt-1 block w-full text-gray-900 dark:text-white" :value="old('exercise_id', $e->id)" required autofocus autocomplete="exercise_id" />
                        <x-text-input id="workout_id" name="workout_id" type="hidden" class="mt-1 block w-full text-gray-900 dark:text-white" :value="old('workout_id', $workout->id)" required autofocus autocomplete="workout_id" />

                        <div class="flex justify-end">  
                            <div class="flex items-center gap-4 ml-3">
                                <x-primary-button>{{ __('Add exercise to workout') }}</x-primary-button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</section>

