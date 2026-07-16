@extends('layouts.adviser-dashboard')

@section('title', 'Assigned Students')

@section('page-title', 'Assigned Students')

@section('content')

<div class="p-8">

    {{-- Page Heading --}}
    <div class="mb-8">

        <h1 class="text-3xl font-bold text-gray-900">
            Assigned Students
        </h1>

        <p class="mt-2 text-sm text-gray-500">
            View students assigned to you and manage their attendance records.
        </p>

    </div>


    {{-- Student Table Card --}}
    <div class="rounded-xl border border-gray-200 bg-white p-8 shadow-sm">


        <div class="mb-6">

            <h2 class="text-lg font-semibold text-gray-900">
                Student List
            </h2>

            <p class="mt-1 text-sm text-gray-500">
                Students currently assigned to this adviser.
            </p>

        </div>



        <div class="overflow-x-auto">

            <table class="w-full text-left">


                <thead>

                    <tr class="border-b border-gray-200 text-sm text-gray-500">

                        <th class="px-4 py-3">
                            Student No.
                        </th>


                        <th class="px-4 py-3">
                            Name
                        </th>


                        <th class="px-4 py-3 text-right">
                            Action
                        </th>

                    </tr>

                </thead>



                <tbody>


                @forelse($students as $student)


                    <tr class="border-b border-gray-100">


                        <td class="px-4 py-4 text-gray-700">

                            {{ $student->student_number }}

                        </td>



                        <td class="px-4 py-4 text-gray-900">

                            {{ $student->last_name }},
                            {{ $student->first_name }}

                        </td>



                        <td class="px-4 py-4 text-right">


                            <a
                                href="{{ route('adviser.attendances.index', $student) }}"
                                class="rounded-lg bg-primary px-4 py-2
                                       text-sm font-medium text-white
                                       transition hover:opacity-90"
                            >

                                View Attendance

                            </a>


                        </td>


                    </tr>


                @empty


                    <tr>

                        <td
                            colspan="3"
                            class="px-4 py-6 text-center text-gray-500"
                        >

                            No assigned students.

                        </td>

                    </tr>


                @endforelse


                </tbody>


            </table>


        </div>



        {{-- Pagination --}}

        <div class="mt-6">

            {{ $students->links() }}

        </div>


    </div>


</div>


@endsection