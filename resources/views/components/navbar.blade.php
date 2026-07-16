<nav class="flex h-20 items-center justify-between border-b border-gray-200 bg-white px-8 shadow-sm">

    <div class="flex items-center gap-5">

        <button
            @click="sidebarOpen = !sidebarOpen"
            class="rounded-xl p-2 text-gray-600 transition-all duration-200 hover:scale-105 hover:bg-gray-100 hover:shadow-sm"
        >
            <x-heroicon-o-bars-3 class="h-6 w-6"/>
        </button>

        <div>

            <h2 class="text-2xl font-bold tracking-tight text-gray-900">

                @yield('page-title', 'Dashboard')

            </h2>

            <p class="text-sm text-gray-500">

                @if(Auth::user()->role->name === 'Admin')

                    Manage the OJT E-Portfolio system.

                @elseif(Auth::user()->role->name === 'Adviser')

                    Review student attendance and submissions.

                @else

                    Track your internship progress.

                @endif

            </p>

        </div>

    </div>

    <div class="flex items-center gap-4">

        <div class="flex items-center gap-3 rounded-xl border border-gray-200 bg-white shadow-sm px-4 py-2 transition hover:bg-gray-100">

            <div class="flex h-10 w-10 items-center justify-center rounded-full bg-gradient-to-br from-primary/20 to-primary/10">

                <x-heroicon-o-user
                    class="h-5 w-5 text-primary"
                />

            </div>

            <div>

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

        </div>

    </div>

</nav>