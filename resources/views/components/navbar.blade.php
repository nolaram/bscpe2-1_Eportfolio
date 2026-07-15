<nav class="flex h-16 items-center justify-between border-b bg-white px-6 shadow-sm">

    <div class="flex items-center gap-4">

        <button
            @click="sidebarOpen = !sidebarOpen"
            class="rounded-lg p-2 hover:bg-gray-100 transition"
        >
            <x-heroicon-o-bars-3 class="h-6 w-6" />
        </button>

        <h2 class="text-xl font-semibold text-gray-800">

            @yield('page-title', 'Dashboard')

        </h2>

    </div>

    <div class="flex items-center gap-4">

        <button class="rounded-full p-2 hover:bg-gray-100">
            
        </button>

        <div class="text-right">

            <p class="font-medium text-gray-800">
                Welcome
            </p>

            <p class="text-sm text-gray-500">
                User
            </p>

        </div>

    </div>

</nav>