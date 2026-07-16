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
                class="h-12 w-12 flex-shrink-0"
            >

            <div class="leading-tight">

                <h1 class="text-lg font-bold tracking-tight">
                    OJT E-Portfolio
                </h1>

                <p class="text-xs text-white/70">
                    Computer Engineering
                </p>

                <div class="mt-2 h-px w-full bg-white/20"></div>

                <p class="mt-2 text-[11px] font-semibold uppercase tracking-widest text-white/80">

                    @if(Auth::user()->role->name === 'Admin')

                        Admin Portal

                    @elseif(Auth::user()->role->name === 'Adviser')

                        Adviser Portal

                    @else

                        Student Portal

                    @endif

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
                class="h-11 w-11"
            >

        </div>

    </div>

    {{-- Navigation --}}
    <nav class="flex-1 px-3 py-6 space-y-2">

        @if(Auth::user()->role->name === 'Admin')

            {{-- Admin Navigation --}}

            <p class="px-3 mb-3 text-xs font-semibold uppercase tracking-wider text-gray-200">
                Main
            </p>

            <a 
                href="{{ route('admin.dashboard') }}"
                class="
                    flex items-center gap-3 rounded-lg px-3 py-3
                    transition hover:translate-x-1 hover:bg-primary-dark
                    {{ request()->routeIs('admin.dashboard') ? 'bg-white/20' : '' }}
                "
            >

                <x-heroicon-o-home class="h-6 w-6 flex-shrink-0" />

                <span x-show="sidebarOpen">
                    Dashboard
                </span>

            </a>


            <p class="px-3 mt-6 mb-3 text-xs font-semibold uppercase tracking-wider text-gray-200">
                Management
            </p>


            <a 
                href="{{ route('admin.students.index') }}"
                class="
                    flex items-center gap-3 rounded-lg px-3 py-3
                    transition hover:translate-x-1 hover:bg-primary-dark
                    {{ request()->routeIs('admin.students.*') ? 'bg-white/20' : '' }}
                "
            >

                <x-heroicon-o-user-group class="h-6 w-6 flex-shrink-0" />

                <span x-show="sidebarOpen">
                    Students
                </span>

            </a>


            <a 
                href="{{ route('admin.advisers.index') }}"
                class="
                    flex items-center gap-3 rounded-lg px-3 py-3
                    transition hover:translate-x-1 hover:bg-primary-dark
                    {{ request()->routeIs('admin.advisers.*') ? 'bg-white/20' : '' }}
                "
            >

                <x-heroicon-o-academic-cap class="h-6 w-6 flex-shrink-0" />

                <span x-show="sidebarOpen">
                    Advisers
                </span>

            </a>



        @elseif(Auth::user()->role->name === 'Adviser')

            {{-- Adviser Navigation --}}

            <p class="px-3 mb-3 text-xs font-semibold uppercase tracking-wider text-gray-200">
                Main
            </p>


            <a 
                href="{{ route('adviser.dashboard') }}"
                class="
                    flex items-center gap-3 rounded-lg px-3 py-3
                    transition hover:translate-x-1 hover:bg-primary-dark
                    {{ request()->routeIs('adviser.dashboard') ? 'bg-white/20' : '' }}
                "
            >

                <x-heroicon-o-home class="h-6 w-6 flex-shrink-0" />

                <span x-show="sidebarOpen">
                    Dashboard
                </span>

            </a>


            <p class="px-3 mt-6 mb-3 text-xs font-semibold uppercase tracking-wider text-gray-200">
                Management
            </p>


            <a 
                href="{{ route('adviser.students.index') }}"
                class="
                    flex items-center gap-3 rounded-lg px-3 py-3
                    transition hover:translate-x-1 hover:bg-primary-dark
                "
            >

                <x-heroicon-o-user-group class="h-6 w-6 flex-shrink-0" />

                <span x-show="sidebarOpen">
                    Assigned Students
                </span>

            </a>



        @elseif(Auth::user()->role->name === 'Student')

            {{-- Student Navigation --}}
            {{-- KEEPING ALL ORIGINAL FEATURES --}}


            <p class="px-3 mb-3 text-xs font-semibold uppercase tracking-wider text-gray-200">
                Main
            </p>


            <a 
                href="{{ route('student.dashboard') }}"
                class="
                    flex items-center gap-3 rounded-lg px-3 py-3
                    transition hover:translate-x-1 hover:bg-primary-dark
                    {{ request()->routeIs('student.dashboard') ? 'bg-white/20' : '' }}
                "
            >

                <x-heroicon-o-home class="h-6 w-6 flex-shrink-0" />

                <span x-show="sidebarOpen">
                    Dashboard
                </span>

            </a>


            <p class="px-3 mt-6 mb-3 text-xs font-semibold uppercase tracking-wider text-gray-200">
                OJT Management
            </p>


            {{-- Profile --}}
            <a 
                href=""
                class="
                    flex items-center gap-3 rounded-lg px-3 py-3
                    transition hover:translate-x-1 hover:bg-primary-dark
                "
            >

                <x-heroicon-o-user-circle class="h-6 w-6 flex-shrink-0" />

                <span x-show="sidebarOpen">
                    Profile
                </span>

            </a>


            {{-- Daily Logs --}}
            <a 
                href="{{ route('student.student.daily-attendances.index') }}"
                class="
                    flex items-center gap-3 rounded-lg px-3 py-3
                    transition hover:translate-x-1 hover:bg-primary-dark
                    {{ request()->routeIs('student.student.daily-attendances.*') ? 'bg-white/20' : '' }}
                "
            >

                <x-heroicon-o-clipboard-document-list class="h-6 w-6 flex-shrink-0" />

                <span x-show="sidebarOpen">
                    Daily Logs
                </span>

            </a>


            {{-- Weekly Reports --}}
            <a 
                href=""
                class="
                    flex items-center gap-3 rounded-lg px-3 py-3
                    transition hover:translate-x-1 hover:bg-primary-dark
                "
            >

                <x-heroicon-o-calendar-days class="h-6 w-6 flex-shrink-0" />

                <span x-show="sidebarOpen">
                    Weekly Reports
                </span>

            </a>


            {{-- Documents --}}
            <a 
                href=""
                class="
                    flex items-center gap-3 rounded-lg px-3 py-3
                    transition hover:translate-x-1 hover:bg-primary-dark
                "
            >

                <x-heroicon-o-folder class="h-6 w-6 flex-shrink-0" />

                <span x-show="sidebarOpen">
                    Documents
                </span>

            </a>


        @endif

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