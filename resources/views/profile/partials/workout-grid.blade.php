<section>
    <header>
        <h2 class="text-lg g-white text-gray-900 dark:text-white">
            {{ __('Exercise overview') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 mb-6">
            {{ __("All exercises available in our application") }}
        </p>

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
