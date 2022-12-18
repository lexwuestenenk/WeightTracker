<nav x-data="{ open: false }" class="bg-gray-100 dark:bg-gray-900">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard.index') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-900 dark:text-white" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('dashboard.index')" :active="request()->routeIs('dashboard.index')" data-cy="dashboard">
                        <p class="text-gray-900 dark:text-white">{{ __('Dashboard') }}</p>
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('exercise.index')" :active="request()->routeIs('exercise.index')" data-cy="exercise">
                        <p class="text-gray-900 dark:text-white">{{ __('Exercises') }}</p>
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('workout.index')" :active="request()->routeIs('workout.index')" data-cy="workout">
                        <p class="text-gray-900 dark:text-white">{{ __('Workouts') }}</p>
                    </x--admin-0nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('user-info.index')" :active="request()->routeIs('user-info.index')" data-cy="user">
                        <p class="text-gray-900 dark:text-white">{{ __('User') }}</p>
                    </x-nav-link>
                </div>
                @if(Auth::user()->isAdministrator())
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('users.index')" :active="request()->routeIs('users.index')" data-cy="admin">
                        <p class="text-gray-900 dark:text-white">{{ __('Admin') }}</p>
                    </x-nav-link>
                </div>
                @endif
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6" data-cy="account-dropdown">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150 bg-gray-100 dark:bg-gray-900">
                            <div class="text-gray-900 dark:text-white">{{ Auth::user()->name }}</div>

                            <div class="ml-1 text-gray-900 dark:text-white">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link class="bg-gray-100 dark:bg-gray-800" :href="route('profile.edit')">
                            <p class="text-gray-900 dark:text-white" data-cy="profile">{{ __('Profile') }}</p>
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link class="bg-gray-100 dark:bg-gray-800" :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                <p class="text-gray-900 dark:text-white" data-cy="logout">{{ __('Log Out') }}</p>
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden bg-gray-100 dark:bg-gray-900">
                <button @click="open = ! open" class="test inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 focus:outline-none bg-gray-100 dark:bg-gray-800 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6 bg-gray-100 dark:bg-gray-800" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard.index')" :active="request()->routeIs('dashboard.index')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('exercise.index')" :active="request()->routeIs('exercise.index')">
                {{ __('Exercises') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('workout.index')" :active="request()->routeIs('workout.index')">
                {{ __('Workouts') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('user-info.index')" :active="request()->routeIs('user-info.index')">
                {{ __('User') }}
            </x-responsive-nav-link>
            @if(Auth::user()->isAdministrator())
                <x-responsive-nav-link :href="route('users.index')" :active="request()->routeIs('users.index')">
                    {{ __('Admin') }}
                </x-responsive-nav-link>
            @endif
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
