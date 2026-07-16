<nav x-data="{ open: false }" class="bg-white border-b border-gray-200 shadow-sm">
    <!-- Primary Navigation Menu -->
    <div class="w-full px-6 lg:px-10">
        <div class="flex h-20 items-center justify-between">
            <div class="flex items-center gap-4">

                {{-- Department Logo --}}
                <a href="{{ route('dashboard') }}" class="shrink-0">

                    <img
                        src="{{ asset('images/pup_logo.webp') }}"
                        alt="Computer Engineering Logo"
                        class="h-12 w-12 rounded-full border border-gray-200 object-cover"
                    >

                </a>

                <div>

                    <h1 class="text-xl font-bold tracking-tight text-gray-900">
                        PUP OJT E-Portfolio
                    </h1>

                    <div class="flex items-center gap-2 text-sm text-gray-500">

                        <span>Computer Engineering Department</span>

                        <span class="text-gray-300">•</span>

                        <span>Administrator Portal</span>

                    </div>

                </div>

            </div>
            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center gap-3 rounded-xl border border-gray-200 bg-white px-4 py-2 shadow-sm transition hover:bg-gray-50 hover:shadow-md"
                        >

                            <div class="flex h-10 w-10 items-center justify-center rounded-full bg-primary/10">

                                <x-heroicon-o-user
                                    class="h-5 w-5 text-primary"
                                />

                            </div>

                            <div class="text-left">

                                <p class="font-semibold text-gray-900">

                                    {{ Auth::user()->name }}

                                </p>

                                <p class="text-xs text-gray-500">

                                    System Administrator

                                </p>

                            </div>

                            <x-heroicon-o-chevron-down
                                class="h-4 w-4 text-gray-400"
                            />

                        </button>
                    </x-slot>

                    <x-slot name="content">

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
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
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">

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
