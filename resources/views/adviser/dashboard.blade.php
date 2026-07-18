<x-app-layout>

    <div class="px-6 pb-16 pt-14 text-center sm:px-8">

        <p class="text-xs font-semibold uppercase tracking-[0.25em] text-primary">
            Computer Engineering Program Section 2-1
        </p>

        <h1 class="mt-3 text-4xl font-extrabold tracking-tight text-gray-900 sm:text-5xl">
            Welcome, {{ Auth::user()->name }}!
        </h1>

        <span class="mx-auto mt-4 block h-1 w-16 rounded-full bg-accent"></span>

        <h2 class="mx-auto mt-6 max-w-xl text-lg font-medium text-gray-500">
            Adviser Dashboard
        </h2>

        <p class="mx-auto mt-2 max-w-xl text-gray-500">
            Review student attendance and internship progress.
        </p>

    </div>

    <div class="relative overflow-hidden bg-gray-50 pb-32 pt-20">

        <div class="pointer-events-none absolute left-1/2 top-0 h-[140%] w-[140%] -translate-x-1/2 rounded-full bg-primary/5 blur-3xl"></div>
        <div class="pointer-events-none absolute -right-40 top-1/3 h-96 w-96 rounded-full bg-accent/10 blur-3xl"></div>
        <div class="pointer-events-none absolute -left-40 bottom-0 h-96 w-96 rounded-full bg-primary/5 blur-3xl"></div>

        <div class="relative mx-auto mb-16 max-w-2xl px-6 text-center">
            <p class="text-xs font-semibold uppercase tracking-[0.25em] text-primary">
                Manage your advisees
            </p>
            <h2 class="mt-3 text-3xl font-bold text-gray-900 sm:text-4xl">
                Everything in one place
            </h2>
        </div>

        <div class="relative mx-auto flex w-[90%] flex-col gap-24">

            {{-- Students Assigned --}}
            <a
                href="{{ route('adviser.students.index') }}"
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
                            Students Assigned
                        </h3>
                        <p class="mt-4 max-w-md text-gray-500">
                            Review attendance and progress for your advisees.
                        </p>
                    </div>

                    <div class="rounded-2xl bg-primary/10 p-4">
                        <x-heroicon-o-user-group class="h-10 w-10 text-primary" />
                    </div>
                </div>

                <div class="relative mt-10 flex items-center text-sm font-semibold text-primary">
                    <span>View Students</span>
                    <x-heroicon-o-arrow-right class="ml-1 h-4 w-4 transition-transform duration-300 group-hover:translate-x-1" />
                </div>
            </a>

            {{-- Profile (no adviser profile route exists yet — shown as Coming Soon,
                 same treatment as the admin dashboard's Reports card) --}}
            <div
                data-animate="reveal-card"
                class="group relative flex min-h-[65vh] w-full translate-y-10 cursor-not-allowed flex-col justify-between overflow-hidden rounded-[2rem] border border-gray-200 bg-white p-10 opacity-0 shadow-2xl transition-all duration-1000 ease-out sm:p-14"
            >
                <div class="pointer-events-none absolute -right-16 -top-16 h-64 w-64 rounded-full bg-accent/10 blur-3xl"></div>

                <div class="relative flex items-start justify-between opacity-70">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">
                            Account
                        </p>
                        <h3 class="mt-3 text-3xl font-bold text-gray-900 sm:text-4xl">
                            Profile
                        </h3>
                        <p class="mt-4 max-w-md text-gray-500">
                            View and update your personal information.
                        </p>
                    </div>

                    <div class="rounded-2xl bg-primary/10 p-4">
                        <x-heroicon-o-user-circle class="h-10 w-10 text-primary" />
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
