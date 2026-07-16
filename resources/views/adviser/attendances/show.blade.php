@extends('layouts.adviser-dashboard')

@section('title', 'Review Attendance')

@section('page-title', 'Review Attendance')

@section('content')

<div class="p-8">

    {{-- Page Heading --}}
    <div class="mb-8">

        <h1 class="text-3xl font-bold text-gray-900">
            Review Attendance
        </h1>

        <p class="mt-2 text-sm text-gray-500">
            Review the attendance details submitted by the student.
        </p>

    </div>


    {{-- Attendance Information Card --}}
    <div class="rounded-xl border border-gray-200 bg-white p-8 shadow-sm">


        <div class="mb-6">

            <h2 class="text-lg font-semibold text-gray-900">
                Attendance Information
            </h2>

            <p class="mt-1 text-sm text-gray-500">
                Attendance record details.
            </p>

        </div>



        <div class="overflow-x-auto">

            <table class="w-full text-left">


                <tbody>


                    <tr class="border-b border-gray-100">

                        <th class="w-48 px-4 py-4 text-sm font-medium text-gray-600">
                            Student
                        </th>

                        <td class="px-4 py-4 text-gray-900">

                            {{ $attendance->student->last_name }},
                            {{ $attendance->student->first_name }}

                        </td>

                    </tr>



                    <tr class="border-b border-gray-100">

                        <th class="px-4 py-4 text-sm font-medium text-gray-600">
                            Date
                        </th>

                        <td class="px-4 py-4 text-gray-900">
                            {{ $attendance->attendance_date }}
                        </td>

                    </tr>



                    <tr class="border-b border-gray-100">

                        <th class="px-4 py-4 text-sm font-medium text-gray-600">
                            Time In
                        </th>

                        <td class="px-4 py-4 text-gray-900">
                            {{ $attendance->time_in }}
                        </td>

                    </tr>



                    <tr class="border-b border-gray-100">

                        <th class="px-4 py-4 text-sm font-medium text-gray-600">
                            Time Out
                        </th>

                        <td class="px-4 py-4 text-gray-900">
                            {{ $attendance->time_out }}
                        </td>

                    </tr>



                    <tr class="border-b border-gray-100">

                        <th class="px-4 py-4 text-sm font-medium text-gray-600">
                            Hours Rendered
                        </th>

                        <td class="px-4 py-4 text-gray-900">
                            {{ $attendance->hours_rendered }} hours
                        </td>

                    </tr>



                    <tr>

                        <th class="px-4 py-4 text-sm font-medium text-gray-600">
                            Status
                        </th>

                        <td class="px-4 py-4">

                            <span class="rounded-full bg-yellow-100 px-3 py-1 text-sm text-yellow-700">

                                {{ $attendance->status }}

                            </span>

                        </td>

                    </tr>


                </tbody>


            </table>


        </div>


    </div>



    {{-- Notice --}}
    <div class="mt-6 rounded-lg border border-green-200 bg-green-50 p-4">


        <h3 class="font-semibold text-green-700">
            Attendance Record
        </h3>


        <p class="mt-2 text-sm text-green-600">

            This attendance has been submitted by the student.
            Advisers may review it at any time.

        </p>


    </div>


</div>


@endsection