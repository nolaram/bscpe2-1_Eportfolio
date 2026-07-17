@extends('layouts.dashboard')

@section('title', 'My Profile')

@section('content')

<div class="mx-auto max-w-5xl space-y-6">

    @if(session('success'))

        <div
            class="rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-green-700"
        >

            {{ session('success') }}

        </div>

    @endif

    {{-- Profile Header --}}
    <div class="rounded-2xl bg-white p-8 shadow-sm">

        <h1 class="text-3xl font-bold text-gray-900">

            My OJT Profile

        </h1>

        <p class="mt-2 text-gray-500">

            Keep your internship information updated.

        </p>

    </div>

    {{-- Progress Statistics --}}
    <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-4">

        <x-dashboard-stat-card
            title="Hours Rendered"
            :value="$statistics['hours_rendered']"
        >
            <x-slot:icon>
                <x-heroicon-o-clock class="h-7 w-7"/>
            </x-slot:icon>
        </x-dashboard-stat-card>

        <x-dashboard-stat-card
            title="Hours Remaining"
            :value="$statistics['remaining_hours']"
        >
            <x-slot:icon>
                <x-heroicon-o-flag class="h-7 w-7"/>
            </x-slot:icon>
        </x-dashboard-stat-card>

        <x-dashboard-stat-card
            title="Attendance Logs"
            :value="$statistics['attendance_logs']"
        >
            <x-slot:icon>
                <x-heroicon-o-calendar-days class="h-7 w-7"/>
            </x-slot:icon>
        </x-dashboard-stat-card>

        <x-dashboard-stat-card
            title="Submitted Logs"
            :value="$statistics['submitted_logs']"
        >
            <x-slot:icon>
                <x-heroicon-o-check-circle class="h-7 w-7"/>
            </x-slot:icon>
        </x-dashboard-stat-card>

    </div>

    <div class="rounded-2xl bg-white p-8 shadow-sm">

        <div class="flex items-center justify-between">

            <h2 class="text-xl font-semibold text-gray-900">

                OJT Progress

            </h2>

            <span class="font-semibold text-primary">

                {{ round($statistics['progress']) }}%

            </span>

        </div>

        <div class="mt-5 h-4 rounded-full bg-gray-200">

            <div
                class="h-4 rounded-full bg-primary transition-all duration-700"
                style="width: {{ $statistics['progress'] }}%;"
            ></div>

        </div>

        <div class="mt-3 flex justify-between text-sm text-gray-500">

            <span>

                {{ number_format($statistics['hours_rendered'],1) }}
                / 300 Hours

            </span>

            <span>

                {{ number_format($statistics['remaining_hours'],1) }}
                Remaining

            </span>

        </div>

    </div>
    

    <form
        method="POST"
        action="{{ route('student.profile.update') }}"
        class="space-y-6"
    >

        @csrf
        @method('PUT')

        {{-- Personal Information --}}
        <div class="rounded-2xl bg-white p-8 shadow-sm">

            <h2 class="mb-6 text-xl font-semibold text-gray-900">

                Personal Information

            </h2>

            <div class="grid gap-6 md:grid-cols-2">

                <div>

                    <label class="mb-2 block text-sm font-medium">

                        Student Number

                    </label>

                    <input
                        type="text"
                        value="{{ $student->student_number }}"
                        disabled
                        class="w-full rounded-lg border bg-gray-100 px-4 py-2"
                    >

                </div>

                <div>

                    <label class="mb-2 block text-sm font-medium">

                        Full Name

                    </label>

                    <input
                        type="text"
                        value="{{ $student->first_name }} {{ $student->last_name }}"
                        disabled
                        class="w-full rounded-lg border bg-gray-100 px-4 py-2"
                    >

                </div>

                <div>

                    <label class="mb-2 block text-sm font-medium">

                        Email

                    </label>

                    <input
                        type="email"
                        value="{{ $student->user->email }}"
                        disabled
                        class="w-full rounded-lg border bg-gray-100 px-4 py-2"
                    >

                </div>

                <div>

                    <label class="mb-2 block text-sm font-medium">

                        Contact Number

                    </label>

                    <input
                        type="text"
                        name="contact_number"
                        value="{{ old('contact_number', $student->contact_number) }}"
                        class="w-full rounded-lg border border-gray-300 px-4 py-2
                               focus:border-primary focus:ring-primary"
                    >

                    @error('contact_number')

                        <p class="mt-1 text-sm text-red-500">

                            {{ $message }}

                        </p>

                    @enderror

                </div>

            </div>

        </div>

        {{-- OJT Information --}}
        <div class="rounded-2xl bg-white p-8 shadow-sm">

            <h2 class="mb-6 text-xl font-semibold text-gray-900">

                OJT Information

            </h2>

            <div class="grid gap-6 md:grid-cols-2">

                <div>

                    <label class="mb-2 block text-sm font-medium">

                        Company Name

                    </label>

                    <input
                        type="text"
                        name="company_name"
                        value="{{ old('company_name', $student->company_name) }}"
                        class="w-full rounded-lg border border-gray-300 px-4 py-2
                               focus:border-primary focus:ring-primary"
                    >

                </div>

                <div>

                    <label class="mb-2 block text-sm font-medium">

                        Company Address

                    </label>

                    <input
                        type="text"
                        name="company_address"
                        value="{{ old('company_address', $student->company_address) }}"
                        class="w-full rounded-lg border border-gray-300 px-4 py-2
                               focus:border-primary focus:ring-primary"
                    >

                </div>

                <div>

                    <label class="mb-2 block text-sm font-medium">

                        OJT Start Date

                    </label>

                    <input
                        type="date"
                        name="ojt_start_date"
                        value="{{ old('ojt_start_date', $student->ojt_start_date) }}"
                        class="w-full rounded-lg border border-gray-300 px-4 py-2
                               focus:border-primary focus:ring-primary"
                    >

                </div>

                <div>

                    <label class="mb-2 block text-sm font-medium">

                        OJT End Date

                    </label>

                    <input
                        type="date"
                        name="ojt_end_date"
                        value="{{ old('ojt_end_date', $student->ojt_end_date) }}"
                        class="w-full rounded-lg border border-gray-300 px-4 py-2
                               focus:border-primary focus:ring-primary"
                    >

                </div>

            </div>

        </div>

        <div class="flex justify-end">

            <button
                class="rounded-lg bg-primary px-6 py-3 font-medium text-white transition hover:opacity-90"
            >

                Save Changes

            </button>

        </div>

    </form>

</div>

@endsection