@extends('layouts.admin')

@section('title', 'Student Details')

@section('page-title', 'Student Details')

@section('content')

@php

    $today = now()->toDateString();

    if (!$student->company_name) {

        $status = 'Not Started';
        $statusColor = 'bg-red-100 text-red-700';

    } elseif (
        $student->ojt_end_date &&
        $student->ojt_end_date < $today
    ) {

        $status = 'Completed';
        $statusColor = 'bg-green-100 text-green-700';

    } else {

        $status = 'Ongoing';
        $statusColor = 'bg-yellow-100 text-yellow-700';

    }

@endphp

<div class="space-y-6">

    {{-- Header --}}
    <div class="rounded-2xl bg-white p-8 shadow-sm">

        <div class="flex items-center justify-between">

            <div class="flex items-center gap-5">

                <div
                    class="flex h-20 w-20 items-center justify-center rounded-full bg-primary/10"
                >

                    <x-heroicon-o-user
                        class="h-10 w-10 text-primary"
                    />

                </div>

                <div>

                    <h1 class="text-3xl font-bold text-gray-900">

                        {{ $student->first_name }}
                        {{ $student->last_name }}

                    </h1>

                    <p class="mt-1 text-gray-500">

                        {{ $student->student_number }}

                    </p>

                    <span
                        class="mt-3 inline-flex rounded-full px-3 py-1 text-sm font-semibold {{ $statusColor }}"
                    >

                        {{ $status }}

                    </span>

                </div>

            </div>

            <a
                href="{{ route('admin.students.index') }}"
                class="rounded-lg border px-4 py-2 hover:bg-gray-50"
            >

                Back

            </a>

        </div>

        {{-- Progress --}}
        <div class="mt-8">

            <div class="mb-2 flex justify-between text-sm">

                <span>

                    OJT Progress

                </span>

                <span>

                    {{ $statistics['progress'] }}%

                </span>

            </div>

            <div class="h-3 rounded-full bg-gray-200">

                <div
                    class="h-3 rounded-full bg-primary"
                    style="width: {{ $statistics['progress'] }}%;"
                ></div>

            </div>

        </div>

    </div>

    {{-- Statistics --}}
    <div class="grid gap-6 md:grid-cols-3">

        <x-dashboard-stat-card
            title="Attendance Logs"
            :value="$statistics['attendance_logs']"
        >

            <x-slot:icon>

                <x-heroicon-o-calendar-days class="h-7 w-7"/>

            </x-slot:icon>

        </x-dashboard-stat-card>

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

    </div>

    {{-- Student Information --}}
    <div class="grid gap-6 md:grid-cols-2">

        {{-- Personal Information --}}
        <div class="rounded-2xl bg-white p-6 shadow-sm">

            <h2 class="mb-5 text-xl font-semibold text-gray-900">
                Personal Information
            </h2>

            <div class="space-y-4">

                <div>
                    <p class="text-sm text-gray-500">
                        Student Number
                    </p>

                    <p class="font-medium">
                        {{ $student->student_number }}
                    </p>
                </div>

                <div>
                    <p class="text-sm text-gray-500">
                        Full Name
                    </p>

                    <p class="font-medium">
                        {{ $student->first_name }}
                        {{ $student->middle_name }}
                        {{ $student->last_name }}
                    </p>
                </div>

                <div>
                    <p class="text-sm text-gray-500">
                        School Email
                    </p>

                    <p class="font-medium">
                        {{ $student->user->email }}
                    </p>
                </div>

                <div>
                    <p class="text-sm text-gray-500">
                        Contact Number
                    </p>

                    <p class="font-medium">
                        {{ $student->contact_number ?: 'Not Provided' }}
                    </p>
                </div>

            </div>

        </div>

        {{-- OJT Information --}}
        <div class="rounded-2xl bg-white p-6 shadow-sm">

            <h2 class="mb-5 text-xl font-semibold text-gray-900">
                OJT Information
            </h2>

            <div class="space-y-4">

                <div>
                    <p class="text-sm text-gray-500">
                        Company Name
                    </p>

                    <p class="font-medium">
                        {{ $student->company_name ?: 'Not Set' }}
                    </p>
                </div>

                <div>
                    <p class="text-sm text-gray-500">
                        Company Address
                    </p>

                    <p class="font-medium">
                        {{ $student->company_address ?: 'Not Set' }}
                    </p>
                </div>

                <div>
                    <p class="text-sm text-gray-500">
                        OJT Start Date
                    </p>

                    <p class="font-medium">
                        {{ $student->ojt_start_date ?: 'Not Set' }}
                    </p>
                </div>

                <div>
                    <p class="text-sm text-gray-500">
                        OJT End Date
                    </p>

                    <p class="font-medium">
                        {{ $student->ojt_end_date ?: 'Not Set' }}
                    </p>
                </div>

                <div>
                    <p class="text-sm text-gray-500">
                        Assigned Adviser
                    </p>

                    <p class="font-medium">
                        {{ $student->adviser?->first_name }}
                        {{ $student->adviser?->last_name ?? 'Not Assigned' }}
                    </p>
                </div>

            </div>

        </div>

    </div>

    {{-- Attendance History --}}
    <div class="rounded-xl bg-white shadow-sm">

        <div class="border-b px-6 py-4">

            <h2 class="text-lg font-semibold">

                Attendance History

            </h2>

        </div>

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead class="bg-gray-50">

                    <tr>

                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">

                            Date

                        </th>

                        <th class="px-6 py-3 text-center text-xs font-semibold uppercase tracking-wide text-gray-500">

                            Time In

                        </th>

                        <th class="px-6 py-3 text-center text-xs font-semibold uppercase tracking-wide text-gray-500">

                            Time Out

                        </th>

                        <th class="px-6 py-3 text-center text-xs font-semibold uppercase tracking-wide text-gray-500">

                            Hours

                        </th>

                        <th class="px-6 py-3 text-center text-xs font-semibold uppercase tracking-wide text-gray-500">

                            Status

                        </th>

                    </tr>

                </thead>

                <tbody class="divide-y divide-gray-100">

                    @forelse($student->dailyAttendances as $attendance)

                        <tr class="hover:bg-gray-50">

                            <td class="px-6 py-4">

                                {{ $attendance->attendance_date->format('M d, Y') }}

                            </td>

                            <td class="px-6 py-4 text-center">

                                {{ \Carbon\Carbon::parse($attendance->time_in)->format('H:i') }}

                            </td>

                            <td class="px-6 py-4 text-center">

                                {{ \Carbon\Carbon::parse($attendance->time_out)->format('H:i') }}

                            </td>

                            <td class="px-6 py-4 text-center">

                                {{ number_format($attendance->hours_rendered,1) }}

                            </td>

                            <td class="px-6 py-4 text-center">

                                <span class="rounded-full bg-blue-100 px-3 py-1 text-xs font-medium text-blue-700">

                                    {{ $attendance->status }}

                                </span>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="5"
                                class="px-6 py-12 text-center text-gray-500"
                            >

                                No attendance records found.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection