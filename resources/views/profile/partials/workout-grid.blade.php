<section>
    <header>
        <h2 class="text-lg g-white text-gray-900 dark:text-white">
            {{ __('Workouts') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 mb-6">
            {{ __("All your workouts") }}
        </p>

        <x-primary-button
            class="mt-3 mb-6"
            x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'create-new-workout')"
        >{{ __('Create new workout') }}</x-primary-button>

        <x-modal name="create-new-workout" focusable>
            <h2 class="text-lg font-medium text-gray-900 px-6 pt-6">Create a new workout</h2>

            <p class="mt-1 text-sm text-gray-600 px-6">
                {{ __('Create a new workout') }}
            </p>

            <!-- Form used to create new workouts -->
            <form method="post" action="{{ route('workout.create') }}" class="p-6">
                @csrf
                @method('post')

                <div class="mb-6">
                    <x-input-label for="name" class="text-gray-900 dark:text-black" :value="__('Workout Name')" />
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" required autofocus autocomplete="name" />
                    <x-input-error class="mt-2" :messages="$errors->get('Workout Name')" />
                </div>

                <div>
                    <x-input-label for="description" class="text-gray-900 dark:text-black" :value="__('Workout Description')" />
                    <x-text-input id="description" name="description" type="text" class="mt-1 block w-full" required autofocus autocomplete="description" />
                    <x-input-error class="mt-2" :messages="$errors->get('Workout Description')" />
                </div>

                <div class="mt-6 flex justify-end">
                    <x-secondary-button x-on:click="$dispatch('close')">
                        {{ __('Cancel') }}
                    </x-secondary-button>
                    <div class="flex items-center gap-4 ml-3">
                        <x-primary-button>{{ __('Create new workout') }}</x-primary-button>
                    </div>
                </div>
            </form>
        </x-modal>



        <div class="exercise-grid">
            @foreach ($workout as $w)
                    <div class="exercise-grid-child shadow sm:rounded-lg">
                        <a href="{{ url('workout/' . $w->id)}}">
                            <div style="height:80%; width: 100%;">
                                <p class="text-gray-900 dark:text-white px-6 pt-6">{{ $w->name }}</p>
                                <br>
                                <p class="px-6">{{ $w->description }}</p>
                            </div>
                        </a>
                        <div class="flex flex-row justify-end pr-6" style="height:20%; width: 100%;">
                            <x-primary-button
                                class="mt-3 mb-3"
                                x-data=""
                                x-on:click.prevent="$dispatch('open-modal', 'delete-workout-{{ $w->id }}')"
                            ><i class="fa-solid fa-trash-can"></i></x-primary-button>
                
                            <x-modal name="delete-workout-{{ $w->id }}" focusable>
                                <h2 class="text-lg font-medium text-gray-900 px-6 pt-6">Create a new workout</h2>
                    
                                <p class="mt-1 text-sm text-gray-600 px-6">
                                    {{ __('Create a new workout') }}
                                </p>
                    
                                <!-- Form used to create new workouts -->
                                <form method="post" action="{{ route('workout.destroy') }}" class="p-6">
                                    @csrf
                                    @method('delete')
                    
                                    <div class="mb-6">
                                        <x-text-input id="name" name="name" type="hidden" class="mt-1 block w-full" value="{{ $w->id }}" required autofocus autocomplete="name" />
                                    </div>

                                    <div class="mt-6 flex justify-end">
                                        <x-secondary-button x-on:click="$dispatch('close')">
                                            {{ __('Cancel') }}
                                        </x-secondary-button>
                                        <div class="flex items-center gap-4 ml-3">
                                            <x-primary-button>{{ __('Delete workout') }}</x-primary-button>
                                        </div>
                                    </div>
                                </form>
                            </x-modal>
                        </div>
                    </div>
            @endforeach
        </div>
    </header>
</section>
