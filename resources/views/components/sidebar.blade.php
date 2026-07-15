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

                <p class="text-xs text-gray-200">
                    Student Portal
                </p>
            </div>

        </div>


        <div 
            x-show="!sidebarOpen" 
            x-transition
        >

            <img 
                src="{{ asset('images/pup_logo.webp') }}"
                alt="PUP Logo"
                class="h-10 w-10"
            >

        </div>

    </div>

    {{-- Navigation --}}
    <nav class="flex-1 px-3 py-6 space-y-2">

        <a href="#" class="flex items-center gap-3 rounded-lg px-3 py-3 hover:bg-primary-dark transition">

            <x-heroicon-o-home class="h-6 w-6 flex-shrink-0" />

            <span x-show="sidebarOpen">
                Dashboard
            </span>

        </a>

        <a href="#" class="flex items-center gap-3 rounded-lg px-3 py-3 hover:bg-primary-dark transition">

            <x-heroicon-o-user-circle class="h-6 w-6 flex-shrink-0" />

            <span x-show="sidebarOpen">
                Profile
            </span>

        </a>

        <a href="#" class="flex items-center gap-3 rounded-lg px-3 py-3 hover:bg-primary-dark transition">

            <x-heroicon-o-clipboard-document-list class="h-6 w-6 flex-shrink-0" />

            <span x-show="sidebarOpen">
                Daily Logs
            </span>

        </a>

        <a href="#" class="flex items-center gap-3 rounded-lg px-3 py-3 hover:bg-primary-dark transition">

            <x-heroicon-o-calendar-days class="h-6 w-6 flex-shrink-0" />

            <span x-show="sidebarOpen">
                Weekly Reports
            </span>

        </a>

        <a href="#" class="flex items-center gap-3 rounded-lg px-3 py-3 hover:bg-primary-dark transition">

            <x-heroicon-o-folder class="h-6 w-6 flex-shrink-0" />

            <span x-show="sidebarOpen">
                Documents
            </span>

        </a>

    </nav>

    {{-- Bottom --}}
    <div class="border-t border-white/20 p-3">

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button
                type="submit"
                class="flex w-full items-center gap-3 rounded-lg px-3 py-3 hover:bg-primary-dark transition"
            >
                <x-heroicon-o-arrow-right-on-rectangle class="h-6 w-6 flex-shrink-0" />

                <span x-show="sidebarOpen">
                    Logout
                </span>
            </button>
        </form>

    </div>

</aside>