<aside
    :class="sidebarOpen ? 'w-64' : 'w-20'"
    class="flex h-screen flex-col bg-primary text-white shadow-lg transition-all duration-300"
>

    {{-- Logo --}}
    <div class="flex h-20 items-center justify-center border-b border-white/20">

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

                <h1 class="text-lg font-bold">
                    OJT E-Portfolio
                </h1>

                <p class="text-xs">
                    Adviser Portal
                </p>

            </div>

        </div>

        {{-- Logo when collapsed --}}
        <img
            x-show="!sidebarOpen"
            x-transition
            src="{{ asset('images/pup_logo.webp') }}"
            alt="PUP Logo"
            class="h-10 w-10"
        >

    </div>

    {{-- Navigation --}}
    <nav class="flex-1 space-y-2 px-3 py-6">

        <a
            href="{{ route('adviser.dashboard') }}"
            class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium transition hover:bg-primary-dark"
        >

            <x-heroicon-o-home class="h-5 w-5 flex-shrink-0"/>

            <span x-show="sidebarOpen" x-transition>
                Dashboard
            </span>

        </a>

        <a
            href="{{ route('adviser.students.index') }}"
            class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium transition hover:bg-primary-dark"
        >

            <x-heroicon-o-user-group class="h-5 w-5 flex-shrink-0"/>

            <span x-show="sidebarOpen" x-transition>
                Assigned Students
            </span>

        </a>

        <a
            href="#"
            class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium transition hover:bg-primary-dark"
        >

            <x-heroicon-o-user-circle class="h-5 w-5 flex-shrink-0"/>

            <span x-show="sidebarOpen" x-transition>
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
                class="flex w-full items-center gap-3 rounded-xl px-4 py-3 text-left text-sm font-medium transition hover:bg-primary-dark"
            >

                <x-heroicon-o-arrow-right-on-rectangle
                    class="h-5 w-5 flex-shrink-0"
                />

                <span x-show="sidebarOpen" x-transition>
                    Logout
                </span>

            </button>

        </form>

    </div>

</aside>