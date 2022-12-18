<section>
    <header>
        <h2 class="text-lg g-white text-gray-900 dark:text-white">
            {{ __('Weight Logs') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 mb-6">
            {{ __("Check all your previous weight entries") }}
        </p>
    </header>

    <div class="container mb-6">
        @foreach ($weight as $w)
            <div class="flex flex-row h-10 log-row">
                <div class="pr-6 flex grow log-row-item" name="weights" data-cy="{{ $w->weights }}">
                    KG: {{ $w->weights }}
                </div>
                <div class="pr-6 flex grow log-row-item" name="bmi" data-cy="{{ $w->bmi }}">
                    BMI: {{ $w->bmi }}
                </div>
                <div class="pr-6 flex grow log-row-item" name="created_at">
                    TIME: {{ $w->created_at }}
                </div>
            </div>
        @endforeach
    </div>

    {{ $weight->links() }}

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>
</section>