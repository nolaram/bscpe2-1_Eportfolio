<header class="bg-white shadow px-6 py-4">

    <div class="flex items-center justify-between">

        <h1 class="text-xl font-semibold">

            @yield('page-title')

        </h1>

        <div>

            {{ Auth::user()->name }}

        </div>

    </div>

</header>