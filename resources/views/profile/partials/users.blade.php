<section>
    <header>
        <h2 class="text-lg g-white text-gray-900 dark:text-white">
            {{ __('Users') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 mb-6">
            {{ __("Check all users") }}
        </p>
    </header>

    <div class="container mb-6">
        @foreach ($users_paginated as $u)
            <div class="flex flex-row h-10 log-row">
                <div class="pr-6 flex grow log-row-item" name="id">
                    ID: {{ $u->id }}
                </div>
                <div class="pr-6 flex grow log-row-item" name="weights">
                    Username: {{ $u->name }}
                </div>
                <div class="pr-6 flex grow log-row-item" name="weights">
                    Email: {{ $u->email }}
                </div>
            </div>
        @endforeach
    </div>

    {{ $users_paginated->links() }}

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>
</section>