<aside
    :class="sidebarOpen ? 'w-64' : 'w-20'"
    class="bg-primary text-white transition-all duration-300 flex flex-col h-screen shadow-lg"
>

    {{-- Logo --}}
    <div class="h-20 flex items-center justify-center border-b border-white/20">

        <div
            x-show="sidebarOpen"
            x-transition
            class="flex items-center gap-3"
        >

            <img
                src="{{ asset('images/pup_logo.webp') }}"
                alt="PUP Logo"
                class="h-12 w-12"
            >

            <div>

                <h1 class="font-bold text-lg">

                    OJT E-Portfolio

                </h1>

                <p class="text-xs text-white/80">

                    Adviser Portal

                </p>

            </div>

        </div>

        <img
            x-show="!sidebarOpen"
            x-transition
            src="{{ asset('images/pup_logo.webp') }}"
            alt="PUP Logo"
            class="h-10 w-10"
        >

    </div>

    {{-- Navigation --}}
    <nav class="flex-1 px-3 py-6 space-y-2">

        {{-- Dashboard --}}
        <a
            href="{{ route('adviser.dashboard') }}"
            class="flex items-center gap-3 rounded-xl px-4 py-3 transition-all duration-200
                {{ request()->routeIs('adviser.dashboard')
                    ? 'bg-white/20'
                    : 'hover:bg-white/10' }}"
        >

            <x-heroicon-o-home class="h-5 w-5 shrink-0"/>

            <span
                x-show="sidebarOpen"
                x-transition
            >
                Dashboard
            </span>

        </a>

        {{-- Assigned Students --}}
        <a
            href="{{ route('adviser.students.index') }}"
            class="flex items-center gap-3 rounded-xl px-4 py-3 transition-all duration-200
                {{ request()->routeIs('adviser.students.*') || request()->routeIs('adviser.attendances.*')
                    ? 'bg-white/20'
                    : 'hover:bg-white/10' }}"
        >

            <x-heroicon-o-user-group class="h-5 w-5 shrink-0"/>

            <span
                x-show="sidebarOpen"
                x-transition
            >
                Assigned Students
            </span>

        </a>

        {{-- Profile --}}
        <a
            href="#"
            class="flex items-center gap-3 rounded-xl px-4 py-3 transition-all duration-200 hover:bg-white/10"
        >

            <x-heroicon-o-user-circle class="h-5 w-5 shrink-0"/>

            <span
                x-show="sidebarOpen"
                x-transition
            >
                Profile
            </span>

        </a>

    </nav>

    {{-- Logout --}}
    <div class="border-t border-white/20 p-3">

        <form
            method="POST"
            action="{{ route('logout') }}"
        >

            @csrf

            <button
                type="submit"
                class="flex w-full items-center gap-3 rounded-xl px-4 py-3 transition-all duration-200 hover:bg-white/10"
            >

                <x-heroicon-o-arrow-left-on-rectangle class="h-5 w-5 shrink-0"/>

                <span
                    x-show="sidebarOpen"
                    x-transition
                >
                    Logout
                </span>

            </button>

        </form>

    </div>

</aside>