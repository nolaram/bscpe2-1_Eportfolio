<x-app-layout>

    <div class="p-8">

    {{-- Statistics --}}
    <div class="grid grid-cols-1 gap-5 mb-8 sm:grid-cols-2 xl:grid-cols-4">

        {{-- Students --}}
        <div class="rounded-xl border border-gray-200 bg-white p-5 shadow-sm">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-sm text-gray-500">
                        Students
                    </p>

                    <h2 class="mt-2 text-3xl font-bold text-gray-900">
                        --
                    </h2>

                </div>

                <div class="rounded-lg bg-primary/10 p-3">

                    <x-heroicon-o-academic-cap
                        class="h-6 w-6 text-primary"
                    />

                </div>

            </div>

        </div>

        {{-- Advisers --}}
        <div class="rounded-xl border border-gray-200 bg-white p-5 shadow-sm">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-sm text-gray-500">
                        Advisers
                    </p>

                    <h2 class="mt-2 text-3xl font-bold text-gray-900">
                        --
                    </h2>

                </div>

                <div class="rounded-lg bg-blue-100 p-3">

                    <x-heroicon-o-user-group
                        class="h-6 w-6 text-blue-600"
                    />

                </div>

            </div>

        </div>

        {{-- Reports --}}
        <div class="rounded-xl border border-gray-200 bg-white p-5 shadow-sm">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-sm text-gray-500">
                        Reports
                    </p>

                    <h2 class="mt-2 text-3xl font-bold text-gray-900">
                        --
                    </h2>

                </div>

                <div class="rounded-lg bg-green-100 p-3">

                    <x-heroicon-o-chart-bar
                        class="h-6 w-6 text-green-600"
                    />

                </div>

            </div>

        </div>

        {{-- Pending --}}
        <div class="rounded-xl border border-gray-200 bg-white p-5 shadow-sm">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-sm text-gray-500">
                        Pending
                    </p>

                    <h2 class="mt-2 text-3xl font-bold text-gray-900">
                        --
                    </h2>

                </div>

                <div class="rounded-lg bg-amber-100 p-3">

                    <x-heroicon-o-clock
                        class="h-6 w-6 text-amber-600"
                    />

                </div>

            </div>

        </div>

    </div>

        {{-- Page Heading --}}
        <div class="mb-10">

            <h1 class="text-3xl font-bold text-gray-900">
                Admin Dashboard
            </h1>

            <p class="mt-2 text-gray-500">
                Welcome back. Manage the OJT E-Portfolio System from one place.
            </p>

        </div>
        
        {{-- Dashboard Modules --}}
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

            {{-- Student Management --}}
            <a
                href="{{ route('admin.students.index') }}"
                class="group rounded-2xl border border-gray-200 bg-white p-7 shadow-sm transition-all duration-200 hover:-translate-y-1 hover:border-primary hover:shadow-lg"
            >

                <div class="flex items-start justify-between">

                    <div class="rounded-xl bg-primary/10 p-3">

                        <x-heroicon-o-academic-cap
                            class="h-7 w-7 text-primary"
                        />

                    </div>

                    <x-heroicon-o-arrow-right
                        class="h-5 w-5 text-gray-400 opacity-0 transition-all duration-200 group-hover:translate-x-1 group-hover:opacity-100"
                    />

                </div>

                <div class="mt-6">

                    <p class="text-sm font-medium text-primary">
                        Student Management
                    </p>

                    <h2 class="mt-1 text-xl font-semibold text-gray-900 group-hover:text-primary transition-colors">
                        Manage Students
                    </h2>

                    <p class="mt-3 text-sm leading-6 text-gray-500">
                        wew
                    </p>

                </div>

            </a>

            {{-- Adviser Management --}}
            <a
                href="#"
                class="group rounded-2xl border border-gray-200 bg-white p-7 shadow-sm transition-all duration-200 hover:-translate-y-1 hover:border-primary hover:shadow-lg"
            >

                <div class="flex items-start justify-between">

                    <div class="rounded-xl bg-primary/10 p-3">

                        <x-heroicon-o-user-group
                            class="h-7 w-7 text-primary"
                        />

                    </div>

                    <x-heroicon-o-arrow-right
                        class="h-5 w-5 text-gray-400 opacity-0 transition-all duration-200 group-hover:translate-x-1 group-hover:opacity-100"
                    />

                </div>

                <div class="mt-6">

                    <p class="text-sm font-medium text-primary">
                        Adviser Management
                    </p>

                    <h2 class="mt-1 text-xl font-semibold text-gray-900 group-hover:text-primary transition-colors">
                        Manage Advisers
                    </h2>

                    <p class="mt-3 text-sm leading-6 text-gray-500">
                        wew
                    </p>

                </div>

            </a>

            {{-- Reports --}}
            <a
                href="#"
                class="group rounded-2xl border border-gray-200 bg-white p-7 shadow-sm transition-all duration-200 hover:-translate-y-1 hover:border-primary hover:shadow-lg"
            >

                <div class="flex items-start justify-between">

                    <div class="rounded-xl bg-primary/10 p-3">

                        <x-heroicon-o-chart-bar
                            class="h-7 w-7 text-primary"
                        />

                    </div>

                    <x-heroicon-o-arrow-right
                        class="h-5 w-5 text-gray-400 opacity-0 transition-all duration-200 group-hover:translate-x-1 group-hover:opacity-100"
                    />

                </div>

                <div class="mt-6">

                    <p class="text-sm font-medium text-primary">
                        Reports
                    </p>

                    <h2 class="mt-1 text-xl font-semibold text-gray-900 group-hover:text-primary transition-colors">
                        View Reports
                    </h2>

                    <p class="mt-3 text-sm leading-6 text-gray-500">
                        wew
                    </p>

                </div>

            </a>

            {{-- System Settings --}}
            <a
                href="#"
                class="group rounded-2xl border border-dashed border-gray-300 bg-gray-50 p-7 transition-all duration-200 hover:border-primary"
            >

                <div class="flex items-start justify-between">

                    <div class="rounded-xl bg-gray-200 p-3">

                        <x-heroicon-o-cog-6-tooth
                            class="h-7 w-7 text-gray-600"
                        />

                    </div>

                    <x-heroicon-o-arrow-right
                        class="h-5 w-5 text-gray-400 opacity-0 transition-all duration-200 group-hover:translate-x-1 group-hover:opacity-100"
                    />

                </div>

                <div class="mt-6">

                    <p class="text-sm font-medium text-gray-500">
                        System
                    </p>

                    <h2 class="mt-1 text-xl font-semibold text-gray-700">
                        Settings
                    </h2>

                    <p class="mt-3 text-sm leading-6 text-gray-500">
                        Configure application settings and future features.
                    </p>

                </div>

            </a>

        </div>

    </div>

</x-app-layout>