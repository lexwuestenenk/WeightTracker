<section>
    <header class="header">
        <h2 class="text-lg g-white text-gray-900 dark:text-white">
            {{ __('Exercises') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 mb-6">
            {{ __("All exercises available in our application") }}
        </p>

        <div class="exercise-grid">
            @foreach ($exercise as $e)
                <div class="exercise-grid-child sm:rounded-lg">
                    <a href="{{ url('exercise/' . $e->id)}}" class="exercise-grid-child-link">
                        <p class="text-gray-900 dark:text-white px-6 pt-6 mb-1">{{ $e->name }}</p>
                        <img src="{{ url('image/' . $e->image) }}" class="exercise-image">
                    </a>
                    <div class="flex flex-row justify-end pr-6" style="height:20%; width: 100%;">
                    </div>
                </div>
            @endforeach
        </div>
    </header>
    {{ $exercise->links() }}
</section>
