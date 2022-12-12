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
        @foreach ($user as $u)
            <div class="flex flex-row h-10 log-row-users">
                <div class="pr-6 flex grow log-row-item" name="id">
                    ID: {{ $u->id }}
                </div>
                <div class="pr-6 flex grow log-row-item" name="name">
                    Username: {{ $u->name }}
                </div>
                <div class="pr-6 flex grow log-row-item" name="email">
                    Email: {{ $u->email }}
                </div>
            </div>
        @endforeach
    </div>

    {{ $user->links() }}

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>
</section>