<section>
    <header>
        <h2 class="text-lg g-white text-gray-900 dark:text-white">
            Exercises in {{ $workout->name }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 mb-6">
            {{ __("All exercises in your workout") }}
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

    </header>
</section>
