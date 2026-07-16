@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')

    {{-- Dashboard Cards --}}
    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-3">

        {{-- Students --}}
        <a
            href="{{ route('admin.students.index') }}"
            class="group rounded-2xl border border-gray-200 bg-white p-6 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-primary hover:shadow-lg"
        >

            <div class="flex items-start justify-between">

                <div>

                    <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">
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

            <div class="mt-6 flex items-center justify-end text-sm font-medium text-primary">

                <span>View Management</span>

                <x-heroicon-o-arrow-right class="ml-1 h-4 w-4 transition-transform duration-300 group-hover:translate-x-1" />

            </div>

        </a>

        {{-- Advisers --}}
        <a
            href="{{ route('admin.advisers.index') }}"
            class="group rounded-2xl border border-gray-200 bg-white p-6 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-primary hover:shadow-lg"
        >

            <div class="flex items-start justify-between">

                <div>

                    <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">
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

            <div class="mt-6 flex items-center justify-end text-sm font-medium text-primary">

                <span>View Management</span>

                <x-heroicon-o-arrow-right class="ml-1 h-4 w-4 transition-transform duration-300 group-hover:translate-x-1" />

            </div>

        </a>

        {{-- Reports --}}
        <div
            class="group cursor-not-allowed rounded-2xl border border-gray-200 bg-white p-6 opacity-70 shadow-sm"
        >

            <div class="flex items-start justify-between">

                <div>

                    <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">
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

            <div class="mt-6 flex items-center justify-end text-sm font-medium text-gray-400">

                <span>Coming Soon</span>

                <x-heroicon-o-arrow-right class="ml-1 h-4 w-4" />

            </div>

        </div>

    </div>

@endsection