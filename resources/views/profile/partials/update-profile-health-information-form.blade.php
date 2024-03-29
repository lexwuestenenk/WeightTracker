<section>
    <header>
        <h2 class="text-lg g-white text-gray-900 dark:text-white">
            {{ __('Health Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's health information") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('user-info.update') }}" class="mt-6 space-y-6" data-cy="user-info-update-form">
        @csrf
        @method('patch')

        <div>
            <x-input-label class="g-white text-gray-900 dark:text-white" for="age" :value="__('Age')" />
            <x-text-input id="age" name="age" type="number" class="mt-1 block w-full" :value="old('age', $personal_information->age)" required autofocus autocomplete="age" data-cy="age"/>
            <x-input-error class="mt-2" :messages="$errors->get('age')" />
        </div>
    
        <div>
            <x-input-label class="g-white text-gray-900 dark:text-white" for="length" :value="__('Length (CM)')" />
            <x-text-input id="length" name="length" type="number" step="any" min="0" class="mt-1 block w-full" :value="old('length', $personal_information->length)" required autofocus autocomplete="length" data-cy="length"/>
            <x-input-error class="mt-2" :messages="$errors->get('length')" />
        </div>

        <div>
            <x-input-label class="g-white text-gray-900 dark:text-white" for="weights" :value="__('Weight (KG)')" />
            <x-text-input id="weights" name="weights" type="number" step="any" min="0" class="mt-1 block w-full" :value="old('weight', $weight_latest->weights)" required autofocus autocomplete="weights" data-cy="weights"/>
            <x-input-error class="mt-2" :messages="$errors->get('Weight')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif

        </div>



        <div class="flex items-center gap-4">
            <x-primary-button data-cy="submit" >{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
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
</section>
