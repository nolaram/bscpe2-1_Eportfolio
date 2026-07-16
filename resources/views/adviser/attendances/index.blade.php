@extends('layouts.adviser-dashboard')

@section('title', 'Student Attendance')

@section('page-title', 'Student Attendance')

@section('content')

<div class="p-8">


    {{-- Page Heading --}}
    <div class="mb-8">

        <h1 class="text-3xl font-bold text-gray-900">

            {{ $student->last_name }},
            {{ $student->first_name }}

        </h1>


        <p class="mt-2 text-sm text-gray-500">
            Review attendance records submitted by this student.
        </p>

    </div>




    {{-- Attendance Table Card --}}
    <div class="rounded-xl border border-gray-200 bg-white p-8 shadow-sm">


        <div class="mb-6">

            <h2 class="text-lg font-semibold text-gray-900">
                Attendance Records
            </h2>

            <p class="mt-1 text-sm text-gray-500">
                View daily OJT attendance history.
            </p>

        </div>



        <div class="overflow-x-auto">


            <table class="w-full text-left">


                <thead>

                    <tr class="border-b border-gray-200 text-sm text-gray-500">

                        <th class="px-4 py-3">
                            Date
                        </th>

                        <th class="px-4 py-3">
                            Time In
                        </th>

                        <th class="px-4 py-3">
                            Time Out
                        </th>

                        <th class="px-4 py-3">
                            Hours
                        </th>

                        <th class="px-4 py-3">
                            Lunch Break
                        </th>

                        <th class="px-4 py-3">
                            Status
                        </th>

                        <th class="px-4 py-3 text-right">
                            Action
                        </th>

                    </tr>

                </thead>



                <tbody>


                @forelse($attendances as $attendance)


                    <tr class="border-b border-gray-100">


                        <td class="px-4 py-4 text-gray-700">

                            {{ $attendance->attendance_date }}

                        </td>



                        <td class="px-4 py-4 text-gray-700">

                            {{ $attendance->time_in }}

                        </td>



                        <td class="px-4 py-4 text-gray-700">

                            {{ $attendance->time_out }}

                        </td>



                        <td class="px-4 py-4 text-gray-700">

                            {{ $attendance->hours_rendered }}

                        </td>



                        <td class="px-4 py-4 text-gray-700">

                            {{ $attendance->has_lunch_break ? 'Yes' : 'No' }}

                        </td>



                        <td class="px-4 py-4">

                            <span class="rounded-full bg-yellow-100 px-3 py-1 text-sm text-yellow-700">

                                {{ $attendance->status }}

                            </span>

                        </td>



                        <td class="px-4 py-4 text-right">


                            <a
                                href="{{ route('adviser.attendances.show', $attendance) }}"
                                class="rounded-lg bg-primary px-4 py-2
                                       text-sm font-medium text-white
                                       transition hover:opacity-90"
                            >

                                Review

                            </a>


                        </td>


                    </tr>


                @empty


                    <tr>

                        <td
                            colspan="7"
                            class="px-4 py-6 text-center text-gray-500"
                        >

                            No attendance records.

                        </td>

                    </tr>


                @endforelse


                </tbody>


            </table>


        </div>



        <div class="mt-6">

            {{ $attendances->links() }}

        </div>


    </div>


</div>


@endsection