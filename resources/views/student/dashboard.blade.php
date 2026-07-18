<x-app-layout>

    <div class="px-6 pb-16 pt-14 text-center sm:px-8">

        <p class="text-xs font-semibold uppercase tracking-[0.25em] text-primary">
            Computer Engineering Program Section 2-1
        </p>

        <h1 class="mt-3 text-4xl font-extrabold tracking-tight text-gray-900 sm:text-5xl">
            Welcome, {{ $student->first_name }}!
        </h1>

        <span class="mx-auto mt-4 block h-1 w-16 rounded-full bg-accent"></span>

        <h2 class="mx-auto mt-6 max-w-xl text-lg font-medium text-gray-500">
            Assigned Adviser:
            {{ $student->adviser?->first_name }}
            {{ $student->adviser?->last_name ?? 'Not Assigned' }}
        </h2>

        <p class="mx-auto mt-2 max-w-xl text-gray-500">
            Track your internship progress from one place.
        </p>

        {{-- Stat cards: centered, slightly larger gap, staggered fade-in on load --}}
        <div class="mx-auto mt-12 grid max-w-5xl grid-cols-1 gap-6 sm:grid-cols-2 xl:grid-cols-4">

            <div
                data-animate="stat-card"
                class="translate-y-6 opacity-0 transition-all duration-700 ease-out"
            >
                <x-dashboard-stat-card
                    title="Daily Attendance"
                    :value="$statistics['total_attendance']"
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
                    :value="$statistics['total_hours']"
                >
                    <x-slot:icon>
                        <x-heroicon-o-clock class="h-7 w-7" />
                    </x-slot:icon>
                </x-dashboard-stat-card>
            </div>

            <div
                data-animate="stat-card"
                class="translate-y-6 opacity-0 transition-all duration-700 ease-out"
            >
                <x-dashboard-stat-card
                    title="Remaining Hours"
                    :value="$statistics['remaining_hours']"
                >
                    <x-slot:icon>
                        <x-heroicon-o-calendar-days class="h-7 w-7" />
                    </x-slot:icon>
                </x-dashboard-stat-card>
            </div>

            <div
                data-animate="stat-card"
                class="translate-y-6 opacity-0 transition-all duration-700 ease-out"
            >
                <x-dashboard-stat-card
                    title="Required Hours"
                    :value="$statistics['required_hours']"
                >
                    <x-slot:icon>
                        <x-heroicon-o-flag class="h-7 w-7" />
                    </x-slot:icon>
                </x-dashboard-stat-card>
            </div>

        </div>

        {{-- OJT Progress: same centered column as the rest of the hero --}}
        <div class="mx-auto mt-6 max-w-5xl text-left">

            <x-section-card title="OJT Progress">

                <div class="space-y-4">

                    <div class="flex justify-between text-sm text-gray-600">

                        <span>
                            {{ $statistics['total_hours'] }}
                            /
                            {{ $statistics['required_hours'] }}
                            Hours Completed
                        </span>

                        <span>
                            {{ $statistics['progress_percentage'] }}%
                        </span>

                    </div>

                    <div class="h-3 w-full rounded-full bg-gray-200">

                        <div
                            class="h-3 rounded-full bg-primary"
                            style="width: {{ $statistics['progress_percentage'] . '%' }};"
                        ></div>

                    </div>

                    <p class="text-sm text-gray-500">
                        {{ $statistics['remaining_hours'] }}
                        hours remaining
                    </p>

                </div>

            </x-section-card>

        </div>

    </div>

    <div class="relative overflow-hidden bg-gray-50 pb-32 pt-20">

        <div class="pointer-events-none absolute left-1/2 top-0 h-[140%] w-[140%] -translate-x-1/2 rounded-full bg-primary/5 blur-3xl"></div>
        <div class="pointer-events-none absolute -right-40 top-1/3 h-96 w-96 rounded-full bg-accent/10 blur-3xl"></div>
        <div class="pointer-events-none absolute -left-40 bottom-0 h-96 w-96 rounded-full bg-primary/5 blur-3xl"></div>

        <div class="relative mx-auto mb-16 max-w-2xl px-6 text-center">
            <p class="text-xs font-semibold uppercase tracking-[0.25em] text-primary">
                Manage your OJT
            </p>
            <h2 class="mt-3 text-3xl font-bold text-gray-900 sm:text-4xl">
                Everything in one place
            </h2>
        </div>

        <div class="relative mx-auto flex w-[90%] flex-col gap-24">

            {{-- Profile --}}
            <a
                href="{{ route('student.profile.edit') }}"
                data-animate="reveal-card"
                class="group relative flex min-h-[65vh] w-full translate-y-10 flex-col justify-between overflow-hidden rounded-[2rem] border border-gray-200 bg-white p-10 opacity-0 shadow-2xl transition-all duration-1000 ease-out hover:-translate-y-1 sm:p-14"
            >
                <div class="pointer-events-none absolute -right-16 -top-16 h-64 w-64 rounded-full bg-primary/5 blur-3xl"></div>

                <div class="relative flex items-start justify-between">
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

                <div class="relative mt-10 flex items-center text-sm font-semibold text-primary">
                    <span>View Profile</span>
                    <x-heroicon-o-arrow-right class="ml-1 h-4 w-4 transition-transform duration-300 group-hover:translate-x-1" />
                </div>
            </a>

            {{-- Daily Logs --}}
            <a
                href="{{ route('student.student.daily-attendances.index') }}"
                data-animate="reveal-card"
                class="group relative flex min-h-[65vh] w-full translate-y-10 flex-col justify-between overflow-hidden rounded-[2rem] border border-gray-200 bg-white p-10 opacity-0 shadow-2xl transition-all duration-1000 ease-out hover:-translate-y-1 sm:p-14"
            >
                <div class="pointer-events-none absolute -right-16 -top-16 h-64 w-64 rounded-full bg-accent/10 blur-3xl"></div>

                <div class="relative flex items-start justify-between">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">
                            Attendance
                        </p>
                        <h3 class="mt-3 text-3xl font-bold text-gray-900 sm:text-4xl">
                            Daily Logs
                        </h3>
                        <p class="mt-4 max-w-md text-gray-500">
                            Record and review your daily attendance.
                        </p>
                    </div>

                    <div class="rounded-2xl bg-primary/10 p-4">
                        <x-heroicon-o-clipboard-document-list class="h-10 w-10 text-primary" />
                    </div>
                </div>

                <div class="relative mt-10 flex items-center text-sm font-semibold text-primary">
                    <span>View Daily Logs</span>
                    <x-heroicon-o-arrow-right class="ml-1 h-4 w-4 transition-transform duration-300 group-hover:translate-x-1" />
                </div>
            </a>

            {{-- Weekly Reports --}}
            <a
                href="{{ route('student.student.weekly-reports.index') }}"
                data-animate="reveal-card"
                class="group relative flex min-h-[65vh] w-full translate-y-10 flex-col justify-between overflow-hidden rounded-[2rem] border border-gray-200 bg-white p-10 opacity-0 shadow-2xl transition-all duration-1000 ease-out hover:-translate-y-1 sm:p-14"
            >
                <div class="pointer-events-none absolute -right-16 -top-16 h-64 w-64 rounded-full bg-primary/5 blur-3xl"></div>

                <div class="relative flex items-start justify-between">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">
                            Reporting
                        </p>
                        <h3 class="mt-3 text-3xl font-bold text-gray-900 sm:text-4xl">
                            Weekly Reports
                        </h3>
                        <p class="mt-4 max-w-md text-gray-500">
                            Submit and track your weekly report status.
                        </p>
                    </div>

                    <div class="rounded-2xl bg-primary/10 p-4">
                        <x-heroicon-o-calendar-days class="h-10 w-10 text-primary" />
                    </div>
                </div>

                <div class="relative mt-10 flex items-center text-sm font-semibold text-primary">
                    <span>View Weekly Reports</span>
                    <x-heroicon-o-arrow-right class="ml-1 h-4 w-4 transition-transform duration-300 group-hover:translate-x-1" />
                </div>
            </a>

            {{-- Documents --}}
            <a
                href="{{ route('student.student.documents.index') }}"
                data-animate="reveal-card"
                class="group relative flex min-h-[65vh] w-full translate-y-10 flex-col justify-between overflow-hidden rounded-[2rem] border border-gray-200 bg-white p-10 opacity-0 shadow-2xl transition-all duration-1000 ease-out hover:-translate-y-1 sm:p-14"
            >
                <div class="pointer-events-none absolute -right-16 -top-16 h-64 w-64 rounded-full bg-accent/10 blur-3xl"></div>

                <div class="relative flex items-start justify-between">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">
                            Files
                        </p>
                        <h3 class="mt-3 text-3xl font-bold text-gray-900 sm:text-4xl">
                            Documents
                        </h3>
                        <p class="mt-4 max-w-md text-gray-500">
                            Upload and manage your OJT documents.
                        </p>
                    </div>

                    <div class="rounded-2xl bg-primary/10 p-4">
                        <x-heroicon-o-folder class="h-10 w-10 text-primary" />
                    </div>
                </div>

                <div class="relative mt-10 flex items-center text-sm font-semibold text-primary">
                    <span>View Documents</span>
                    <x-heroicon-o-arrow-right class="ml-1 h-4 w-4 transition-transform duration-300 group-hover:translate-x-1" />
                </div>
            </a>

        </div>

    </div>

</x-app-layout>
