<x-app-layout>

    <div class="p-8">

        {{-- Page Heading --}}
        <div class="mb-10">

            <h1 class="text-3xl font-bold text-gray-900">
                Admin Dashboard
            </h1>

            <p class="mt-2 text-gray-500">
                Welcome back. Manage the OJT E-Portfolio system from one place.
            </p>

        </div>

        {{-- Dashboard Cards --}}
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-3">

            {{-- Students --}}
            <a
                href="{{ route('admin.students.index') }}"
                class="group rounded-2xl border border-gray-200 bg-white p-6 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-primary hover:shadow-lg"
            >

                <div class="flex items-start justify-between">

                    <div>

                        <p class="text-sm font-medium text-primary">
                            Student Management
                        </p>

                        <h2 class="mt-2 text-xl font-semibold text-gray-900">
                            Manage Students
                        </h2>

                        <p class="mt-3 text-sm text-gray-500">
                            Create, edit and manage student accounts.
                        </p>

                    </div>

                    <div class="rounded-xl bg-primary/10 p-3">

                        <x-heroicon-o-user-group
                            class="h-7 w-7 text-primary"
                        />

                    </div>

                </div>

            </a>

            {{-- Advisers --}}
            <a
                href="#"
                class="group rounded-2xl border border-gray-200 bg-white p-6 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-primary hover:shadow-lg"
            >

                <div class="flex items-start justify-between">

                    <div>

                        <p class="text-sm font-medium text-primary">
                            Adviser Management
                        </p>

                        <h2 class="mt-2 text-xl font-semibold text-gray-900">
                            Manage Advisers
                        </h2>

                        <p class="mt-3 text-sm text-gray-500">
                            Assign and organize advisers.
                        </p>

                    </div>

                    <div class="rounded-xl bg-primary/10 p-3">

                        <x-heroicon-o-academic-cap
                            class="h-7 w-7 text-primary"
                        />

                    </div>

                </div>

            </a>

            {{-- Reports --}}
            <a
                href="#"
                class="group rounded-2xl border border-gray-200 bg-white p-6 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-primary hover:shadow-lg"
            >

                <div class="flex items-start justify-between">

                    <div>

                        <p class="text-sm font-medium text-primary">
                            Reports
                        </p>

                        <h2 class="mt-2 text-xl font-semibold text-gray-900">
                            View Reports
                        </h2>

                        <p class="mt-3 text-sm text-gray-500">
                            Review portfolio statistics and summaries.
                        </p>

                    </div>

                    <div class="rounded-xl bg-primary/10 p-3">

                        <x-heroicon-o-document-chart-bar
                            class="h-7 w-7 text-primary"
                        />

                    </div>

                </div>

            </a>

        </div>

    </div>

</x-app-layout>