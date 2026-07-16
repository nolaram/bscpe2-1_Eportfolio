<nav
    class="flex h-20 items-center justify-between border-b border-gray-200 bg-white px-8 shadow-sm"
    x-data="{ profileOpen: false }"
>

    <div class="flex items-center gap-5">

        <button
            @click="sidebarOpen = !sidebarOpen"
            class="rounded-xl p-2 text-gray-600 transition-all duration-200 hover:scale-105 hover:bg-gray-100 hover:shadow-sm"
        >
            <x-heroicon-o-bars-3 class="h-6 w-6"/>
        </button>

        <a
            href="{{ route('dashboard') }}"
            class="block"
        >

            <h2 class="text-2xl font-bold tracking-tight text-gray-900">

                @yield('page-title', 'PUP OJT E-Portfolio')

            </h2>

            <p class="text-sm text-gray-500">

                @if(Auth::user()->role->name === 'Admin')

                    Computer Engineering Portal

                @elseif(Auth::user()->role->name === 'Adviser')

                    Review student attendance and submissions.

                @else

                    Track your internship progress.

                @endif

            </p>

        </a>

    </div>

    <div class="relative">

        <button
            @click="profileOpen = !profileOpen"
            class="flex items-center gap-3 rounded-xl border border-gray-200 bg-white px-4 py-2 shadow-sm transition hover:bg-gray-100"
        >

            <div
                class="flex h-10 w-10 items-center justify-center rounded-full bg-gradient-to-br from-primary/20 to-primary/10"
            >

                <x-heroicon-o-user
                    class="h-5 w-5 text-primary"
                />

            </div>

            <div class="text-left">

                <p class="font-semibold text-gray-900">

                    {{ Auth::user()->name }}

                </p>

                <p class="text-xs text-gray-500">

                    @if(Auth::user()->role->name === 'Admin')

                        System Administrator

                    @elseif(Auth::user()->role->name === 'Adviser')

                        Adviser

                    @else

                        Student

                    @endif

                </p>

            </div>

            <x-heroicon-o-chevron-down
                class="h-4 w-4 text-gray-500"
            />

        </button>

        <div
            x-show="profileOpen"
            @click.outside="profileOpen = false"
            x-transition
            class="absolute right-0 mt-2 w-52 rounded-xl border border-gray-200 bg-white shadow-lg"
            style="display:none;"
        >

            <form
                method="POST"
                action="{{ route('logout') }}"
            >

                @csrf

                <button
                    type="submit"
                    class="block w-full px-4 py-3 text-left text-sm text-red-600 hover:bg-gray-100"
                >

                    Log Out

                </button>

            </form>

        </div>

    </div>

</nav>