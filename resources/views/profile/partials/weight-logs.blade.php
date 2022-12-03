<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Weight Logs') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Check all your previous weight entries") }}
        </p>
    </header>

    <div class="container">
        @foreach ($weight as $w)
            <div class="flex flex-row h-10 bg-emerald-200">
                <div class="pr-6 min-w-10" name="user_id">
                    ID: {{ $w->user_id }} 
                </div>
                <p>&nbsp-&nbsp</p>
                <div class="pr-6" name="weights">
                    KG: {{ $w->weights }}
                </div>
                <p>&nbsp-&nbsp</p>
                <div class="pr-6" name="weights">
                    BMI: {{ $w->bmi }}
                </div>
                <p>&nbsp-&nbsp</p>
                <div class="pr-6" name="created_at">
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