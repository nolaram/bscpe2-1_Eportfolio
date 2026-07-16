<aside
    :class="sidebarOpen ? 'w-64' : 'w-20'"
    class="bg-primary text-white transition-all duration-300 flex flex-col h-screen shadow-lg"
>

    {{-- Logo --}}
    <div class="h-20 flex items-center justify-center border-b border-white/20">

        <div
            x-show="sidebarOpen"
            class="flex items-center gap-3"
        >

            <img
                src="{{ asset('images/pup_logo.webp') }}"
                class="h-12 w-12"
            >

            <div>

                <h1 class="font-bold text-lg">

                    OJT E-Portfolio

                </h1>

                <p class="text-xs">

                    Adviser Portal

                </p>

            </div>

        </div>

    </div>

    {{-- Navigation --}}
    <nav class="flex-1 px-3 py-6 space-y-2">

        <a
            href="{{ route('adviser.dashboard') }}"
            class="block rounded-lg px-3 py-3 hover:bg-primary-dark"
        >
            Dashboard
        </a>

        <a
            href="{{ route('adviser.students.index') }}"
            class="block rounded-lg px-3 py-3 hover:bg-primary-dark"
        >
            Assigned Students
        </a>

        <a
            href="#"
            class="block rounded-lg px-3 py-3 hover:bg-primary-dark"
        >
            Profile
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
                class="w-full rounded-lg px-3 py-3 hover:bg-primary-dark text-left"
            >

                Logout

            </button>

        </form>

    </div>

</aside>