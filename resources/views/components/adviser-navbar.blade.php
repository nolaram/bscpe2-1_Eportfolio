<nav
    class="flex h-20 items-center justify-between border-b border-gray-200 bg-white px-8 shadow-sm"
>

    {{-- Left Side --}}
    <div class="flex items-center gap-5">

        <button
            @click="sidebarOpen = !sidebarOpen"
            class="rounded-xl p-2 text-gray-600 transition-all duration-200 hover:bg-gray-100 hover:shadow-sm"
        >

            <x-heroicon-o-bars-3 class="h-6 w-6"/>

        </button>

        <div>

            <h2 class="text-2xl font-bold tracking-tight text-gray-900">

                @yield('page-title', 'Adviser Portal')

            </h2>

            <p class="text-sm text-gray-500">

                Review student attendance and internship progress.

            </p>

        </div>

    </div>

    {{-- Right Side --}}
    <div class="flex items-center gap-3">

        <div
            class="flex h-10 w-10 items-center justify-center rounded-full bg-primary/10"
        >

            <x-heroicon-o-user
                class="h-5 w-5 text-primary"
            />

        </div>

        <div class="text-right">

            <p class="font-semibold text-gray-900">

                {{ Auth::user()->name }}

            </p>

            <p class="text-xs text-gray-500">

                Adviser

            </p>

        </div>

    </div>

</nav>