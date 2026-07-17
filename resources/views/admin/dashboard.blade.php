<x-app-layout>

    <div class="px-6 pb-16 pt-14 text-center sm:px-8">

        <p class="text-xs font-semibold uppercase tracking-[0.25em] text-primary">
            Computer Engineering Department
        </p>

        <h1 class="mt-3 text-4xl font-extrabold tracking-tight text-gray-900 sm:text-5xl">
            Admin Dashboard
        </h1>

        <span class="mx-auto mt-4 block h-1 w-16 rounded-full bg-accent"></span>

        <h2 class="mx-auto mt-6 max-w-xl text-lg font-medium text-gray-500">
            System Overview
        </h2>

        <p class="mx-auto mt-2 max-w-xl text-gray-500">
            Welcome back. Manage the OJT E-Portfolio system from one place.
        </p>

        {{-- Stat cards: centered, slightly larger gap, staggered fade-in on load --}}
        <div class="mx-auto mt-12 grid max-w-5xl grid-cols-1 gap-6 sm:grid-cols-2 xl:grid-cols-4">

            <div
                data-animate="stat-card"
                class="translate-y-6 opacity-0 transition-all duration-700 ease-out"
            >
                <x-dashboard-stat-card
                    title="Students"
                    :value="$statistics['students']"
                >
                    <x-slot:icon>
                        <x-heroicon-o-user-group class="h-7 w-7" />
                    </x-slot:icon>
                </x-dashboard-stat-card>
            </div>

            <div
                data-animate="stat-card"
                class="translate-y-6 opacity-0 transition-all duration-700 ease-out"
            >
                <x-dashboard-stat-card
                    title="Advisers"
                    :value="$statistics['advisers']"
                >
                    <x-slot:icon>
                        <x-heroicon-o-academic-cap class="h-7 w-7" />
                    </x-slot:icon>
                </x-dashboard-stat-card>
            </div>

            <div
                data-animate="stat-card"
                class="translate-y-6 opacity-0 transition-all duration-700 ease-out"
            >
                <x-dashboard-stat-card
                    title="Attendance Logs"
                    :value="$statistics['attendance_logs']"
                >
                    <x-slot:icon>
                        <x-heroicon-o-clipboard-document-list class="h-7 w-7" />
                    </x-slot:icon>
                </x-dashboard-stat-card>
            </div>

            <div
                data-animate="stat-card"
                class="translate-y-6 opacity-0 transition-all duration-700 ease-out"
            >
                <x-dashboard-stat-card
                    title="Hours Rendered"
                    :value="$statistics['hours_rendered']"
                >
                    <x-slot:icon>
                        <x-heroicon-o-clock class="h-7 w-7" />
                    </x-slot:icon>
                </x-dashboard-stat-card>
            </div>

        </div>

    </div>

    <div class="relative overflow-hidden bg-gray-50 pb-32 pt-20">

        <div class="pointer-events-none absolute left-1/2 top-0 h-[140%] w-[140%] -translate-x-1/2 rounded-full bg-primary/5 blur-3xl"></div>
        <div class="pointer-events-none absolute -right-40 top-1/3 h-96 w-96 rounded-full bg-accent/10 blur-3xl"></div>
        <div class="pointer-events-none absolute -left-40 bottom-0 h-96 w-96 rounded-full bg-primary/5 blur-3xl"></div>

        <div class="relative mx-auto mb-16 max-w-2xl px-6 text-center">
            <p class="text-xs font-semibold uppercase tracking-[0.25em] text-primary">
                Manage the program
            </p>
            <h2 class="mt-3 text-3xl font-bold text-gray-900 sm:text-4xl">
                Everything in one place
            </h2>
        </div>

        <div class="relative mx-auto flex w-[90%] flex-col gap-24">

            {{-- Students --}}
            <a
                href="{{ route('admin.students.index') }}"
                data-animate="reveal-card"
                class="group relative flex min-h-[65vh] w-full translate-y-10 flex-col justify-between overflow-hidden rounded-[2rem] border border-gray-200 bg-white p-10 opacity-0 shadow-2xl transition-all duration-1000 ease-out hover:-translate-y-1 sm:p-14"
            >
                <div class="pointer-events-none absolute -right-16 -top-16 h-64 w-64 rounded-full bg-primary/5 blur-3xl"></div>

                <div class="relative flex items-start justify-between">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">
                            Student Management
                        </p>
                        <h3 class="mt-3 text-3xl font-bold text-gray-900 sm:text-4xl">
                            Manage Students
                        </h3>
                        <p class="mt-4 max-w-md text-gray-500">
                            Create, edit and manage student accounts.
                        </p>
                    </div>

                    <div class="rounded-2xl bg-primary/10 p-4">
                        <x-heroicon-o-user-group class="h-10 w-10 text-primary" />
                    </div>
                </div>

                <div class="relative mt-10 flex items-center text-sm font-semibold text-primary">
                    <span>View Management</span>
                    <x-heroicon-o-arrow-right class="ml-1 h-4 w-4 transition-transform duration-300 group-hover:translate-x-1" />
                </div>
            </a>

            {{-- Advisers --}}
            <a
                href="{{ route('admin.advisers.index') }}"
                data-animate="reveal-card"
                class="group relative flex min-h-[65vh] w-full translate-y-10 flex-col justify-between overflow-hidden rounded-[2rem] border border-gray-200 bg-white p-10 opacity-0 shadow-2xl transition-all duration-1000 ease-out hover:-translate-y-1 sm:p-14"
            >
                <div class="pointer-events-none absolute -right-16 -top-16 h-64 w-64 rounded-full bg-accent/10 blur-3xl"></div>

                <div class="relative flex items-start justify-between">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">
                            Adviser Management
                        </p>
                        <h3 class="mt-3 text-3xl font-bold text-gray-900 sm:text-4xl">
                            Manage Advisers
                        </h3>
                        <p class="mt-4 max-w-md text-gray-500">
                            Assign and organize advisers.
                        </p>
                    </div>

                    <div class="rounded-2xl bg-primary/10 p-4">
                        <x-heroicon-o-academic-cap class="h-10 w-10 text-primary" />
                    </div>
                </div>

                <div class="relative mt-10 flex items-center text-sm font-semibold text-primary">
                    <span>View Management</span>
                    <x-heroicon-o-arrow-right class="ml-1 h-4 w-4 transition-transform duration-300 group-hover:translate-x-1" />
                </div>
            </a>

            {{-- Reports --}}
            <div
                data-animate="reveal-card"
                class="group relative flex min-h-[65vh] w-full translate-y-10 cursor-not-allowed flex-col justify-between overflow-hidden rounded-[2rem] border border-gray-200 bg-white p-10 opacity-0 shadow-2xl transition-all duration-1000 ease-out sm:p-14"
            >
                <div class="pointer-events-none absolute -right-16 -top-16 h-64 w-64 rounded-full bg-primary/5 blur-3xl"></div>

                <div class="relative flex items-start justify-between opacity-70">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">
                            Reports
                        </p>
                        <h3 class="mt-3 text-3xl font-bold text-gray-900 sm:text-4xl">
                            View Reports
                        </h3>
                        <p class="mt-4 max-w-md text-gray-500">
                            Review portfolio statistics and summaries.
                        </p>
                    </div>

                    <div class="rounded-2xl bg-primary/10 p-4">
                        <x-heroicon-o-document-chart-bar class="h-10 w-10 text-primary" />
                    </div>
                </div>

                <div class="relative mt-10 flex items-center text-sm font-semibold text-gray-400 opacity-70">
                    <span>Coming Soon</span>
                    <x-heroicon-o-arrow-right class="ml-1 h-4 w-4" />
                </div>
            </div>

        </div>

    </div>

</x-app-layout>