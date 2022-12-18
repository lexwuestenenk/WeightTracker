<section>
    <header>
        <div class="header-div">
            <div class="title">
                <h2 class="text-lg g-white text-gray-900 dark:text-white">
                    {{ __('Workouts') }}
                </h2>

                <p class="mt-1 text-sm text-gray-600 mb-6">
                    {{ __("All your workouts") }}
                </p>
            </div>
            <div class="button_container">
                <x-primary-button
                    class="mt-3 mb-6"
                    x-data=""
                    data-cy="workout-create"
                    x-on:click.prevent="$dispatch('open-modal', 'create-new-workout')"
                >{{ __('Create new workout') }}</x-primary-button>
            </div>
        </div>
        <x-modal name="create-new-workout" focusable>
            <h2 class="text-lg font-medium px-6 pt-6 text-gray-900 dark:text-white">Create a new workout</h2>

            <p class="mt-1 text-sm text-gray-600 px-6">
                {{ __('Create a new workout') }}
            </p>

            <!-- Form used to create new workouts -->
            <form method="post" action="{{ route('workout.create') }}" class="p-6" data-cy="workout-create-form">
                @csrf
                @method('post')

                <div class="mb-6">
                    <x-input-label for="name" class="text-gray-900 text-gray-900 dark:text-white" :value="__('Workout Name')" />
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" data-cy="name" required autofocus autocomplete="name" />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>

                <div>
                    <x-input-label for="description" class="text-gray-900 text-gray-900 dark:text-white" :value="__('Workout Description')" />
                    <x-text-input id="description" name="description" type="text" class="mt-1 block w-full" data-cy="description" required autofocus autocomplete="description" />
                    <x-input-error class="mt-2" :messages="$errors->get('description')" />
                </div>

                <div class="mt-6 flex justify-end">
                    <x-secondary-button x-on:click="$dispatch('close')" data-cy="cancel">
                        {{ __('Cancel') }}
                    </x-secondary-button>
                    <div class="flex items-center gap-4 ml-3">
                        <x-primary-button data-cy="submit">{{ __('Create new workout') }}</x-primary-button>
                    </div>
                </div>
            </form>
        </x-modal>
    </header>
    <div class="exercise-grid">
        @foreach ($workout as $w)
                <div class="exercise-grid-child shadow sm:rounded-lg" data-cy="{{ $w->name }}">
                    <a href="{{ url('workout/' . $w->id)}}">
                        <div style="height:80%; width: 100%;">
                            <p class="text-gray-900 dark:text-white px-6 pt-6">{{ $w->name }}</p>
                            <br>
                            <p class="px-6">{{ $w->description }}</p>
                        </div>
                    </a>
                    <div class="flex flex-row justify-end pr-6" style="height:20%; width: 100%;">
                        <x-primary-button
                            class="mt-3 mb-3 mr-3"
                            x-data=""
                            data-cy="workout-edit"
                            x-on:click.prevent="$dispatch('open-modal', 'edit-workout-{{ $w->id }}')"
                        ><i class="fa-solid fa-pencil"></i></x-primary-button>
            
                        <x-modal name="edit-workout-{{ $w->id }}" focusable>
                            <h2 class="text-lg font-medium px-6 pt-6 text-gray-900 dark:text-white">Fill in the fields to update the workout</h2>
                
                            <p class="mt-1 text-sm text-gray-600 px-6">
                                {{ $w->name }}
                            </p>

                            {{-- Update workout using the workout.update route 
                                This function opens up a modal that asks the user to verify
                                they want to delete the workout--}}
                            <form method="post" action="{{ route('workout.update') }}" class="p-6" data-cy="{{ $w->name }}-edit">
                                @csrf
                                @method('patch')
                
                                <div class="mb-6">
                                    <x-text-input id="id" name="id" type="hidden" class="mt-1 block w-full" :value="old('id', $w->id)" required autofocus autocomplete="id" />
                                </div>
                                <div>
                                    <x-input-label class="g-white text-gray-900 dark:text-white" for="name" :value="__('Name')" />
                                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" data-cy="name" :value="old('name', $w->name)" required autofocus autocomplete="age" />
                                    <x-input-error class="mt-2" :messages="$errors->get('age')" />
                                </div>
                            
                                <div>
                                    <x-input-label class="g-white text-gray-900 dark:text-white" for="description" :value="__('Length (CM)')" />
                                    <x-text-input id="description" name="description" type="text" class="mt-1 block w-full" data-cy="description" :value="old('description', $w->description)" required autofocus autocomplete="length" />
                                    <x-input-error class="mt-2" :messages="$errors->get('description')" />
                                </div>

                                <div class="mt-6 flex justify-end">
                                    <x-secondary-button x-on:click="$dispatch('close')" data-cy="cancel">
                                        {{ __('Cancel') }}
                                    </x-secondary-button>
                                    <div class="flex items-center gap-4 ml-3" data-cy="submit">
                                        <x-primary-button>{{ __('Update workout') }}</x-primary-button>
                                    </div>
                                </div>
                            </form>
                        </x-modal>

                            <!-- Delete workout using the workout.delete route 
                            This function opens up a modal that asks the user to verify
                            they want to delete the workout -->
                        <x-primary-button
                            class="mt-3 mb-3"
                            x-data=""
                            data-cy="workout-delete"
                            x-on:click.prevent="$dispatch('open-modal', 'delete-workout-{{ $w->id }}')"
                        ><i class="fa-solid fa-trash-can"></i></x-primary-button>
            
                        <x-modal name="delete-workout-{{ $w->id }}" focusable>
                            <h2 class="text-lg font-medium px-6 pt-6 text-gray-900 dark:text-white">Are you sure you want to delete this workout?</h2>
                
                            <p class="mt-1 text-sm text-gray-600 px-6">
                                {{ $w->name }}
                            </p>

                            <!-- Form used to create new workouts -->
                            <form method="post" action="{{ route('workout.destroy') }}" class="p-6" data-cy="{{ $w->name }}-delete">
                                @csrf
                                @method('delete')
                
                                <div class="mb-6">
                                    <x-text-input id="id" name="id" type="hidden" class="mt-1 block w-full" :value="old('id', $w->id)" required autofocus autocomplete="id" />
                                </div>
                
                                <div class="mt-6 flex justify-end">
                                    <x-secondary-button x-on:click="$dispatch('close')" data-cy="cancel">
                                        {{ __('Cancel') }}
                                    </x-secondary-button>
                                    <div class="flex items-center gap-4 ml-3" data-cy="submit">
                                        <x-primary-button>{{ __('Delete workout') }}</x-primary-button>
                                    </div>
                                </div>
                            </form>
                        </x-modal>
                    </div>
                </div>
        @endforeach
    </div>
</section>
