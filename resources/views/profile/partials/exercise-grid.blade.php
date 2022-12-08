<section>
    <header>
        <h2 class="text-lg g-white text-gray-900 dark:text-white">
            {{ __('Exercises') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 mb-6">
            {{ __("All exercises available in our application") }}
        </p>

        <div class="exercise-grid">
            @foreach ($exercise as $e)
                <a href="{{ url('exercise/' . $e->id)}}">
                    <div class="exercise-grid-child p-4 sm:p-8 shadow sm:rounded-lg">
                        <p class="text-gray-900 dark:text-white">{{ $e->name }}</p>
                        <br>
                        <p>{{ $e->description }}</p>
                    </div>
                </a>
            @endforeach
        </div>
        <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
            @csrf
            @method('put')
    
            <div>
                <x-input-label for="current_password" :value="__('Current Password')" />
                <x-text-input id="current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" />
                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
            </div>
    
            <div>
                <x-input-label for="password" :value="__('New Password')" />
                <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
            </div>
    
            <div>
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
            </div>
    
            <div class="flex items-center gap-4">
                <x-primary-button>{{ __('Save') }}</x-primary-button>
    
                @if (session('status') === 'password-updated')
                    <p
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600"
                    >{{ __('Saved.') }}</p>
                @endif
            </div>
        </form>
    </header>
</section>
