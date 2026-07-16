@extends('layouts.dashboard')

@section('title', 'Daily Attendance')

@section('page-title', 'Daily Attendance')

@section('content')

    <div class="p-8">

        {{-- Header --}}
        <div class="mb-8 flex flex-col gap-4 md:flex-row md:items-center md:justify-between">

            <div>

                <h1 class="text-3xl font-bold text-gray-900">
                    Daily Attendance
                </h1>

                <p class="mt-2 text-sm text-gray-500">
                    Track and manage your daily OJT attendance records.
                </p>

            </div>


            <a
                href="{{ route('student.student.daily-attendances.create') }}"
                class="inline-flex items-center justify-center gap-2
                       rounded-lg bg-primary px-5 py-2.5
                       text-sm font-medium text-white
                       shadow-sm transition hover:opacity-90"
            >

                <x-heroicon-o-plus class="h-5 w-5"/>

                Add Attendance

            </a>


        </div>



        {{-- Attendance Table --}}
        <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">

            <div class="overflow-x-auto">

                <table class="w-full">


                    <thead class="bg-gray-50">

                        <tr>

                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                Date
                            </th>

                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                Time In
                            </th>

                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                Time Out
                            </th>

                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                Hours
                            </th>

                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                Lunch Break
                            </th>

                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                Status
                            </th>

                            <th class="px-6 py-3 text-center text-xs font-semibold uppercase tracking-wide text-gray-500">
                                Actions
                            </th>

                        </tr>

                    </thead>


                    <tbody class="divide-y divide-gray-100">


                    @forelse($attendances as $attendance)


                        <tr class="transition hover:bg-gray-50">


                            <td class="px-6 py-4 text-sm text-gray-700">
                                {{ $attendance->attendance_date }}
                            </td>

                            <td class="px-6 py-4 text-sm text-gray-700">

                                {{ $attendance->has_lunch_break ? 'Yes' : 'No' }}

                            </td>

                            <td class="px-6 py-4 text-sm text-gray-700">
                                {{ $attendance->time_in }}
                            </td>


                            <td class="px-6 py-4 text-sm text-gray-700">
                                {{ $attendance->time_out }}
                            </td>


                            <td class="px-6 py-4 text-sm text-gray-700">
                                {{ $attendance->hours_rendered }}
                            </td>


                            <td class="px-6 py-4">

                                <span class="rounded-full bg-yellow-50 px-3 py-1 text-xs font-medium text-yellow-700">

                                    {{ $attendance->status }}

                                </span>

                            </td>



                            <td class="px-6 py-4">


                                @if($attendance->status === 'Submitted')


                                    <div class="flex justify-center gap-2">


                                        <a
                                            href="{{ route(
                                                'student.student.daily-attendances.edit',
                                                $attendance
                                            ) }}"
                                            class="inline-flex items-center gap-1 rounded-md
                                                   border border-gray-300 px-3 py-1.5
                                                   text-sm text-gray-700 transition
                                                   hover:bg-gray-100"
                                        >

                                            <x-heroicon-o-pencil-square class="h-4 w-4"/>

                                            Edit

                                        </a>



                                        <form
                                            action="{{ route(
                                                'student.student.daily-attendances.destroy',
                                                $attendance
                                            ) }}"
                                            method="POST"
                                        >

                                            @csrf
                                            @method('DELETE')


                                            <button
                                                type="submit"
                                                onclick="return confirm('Delete this attendance?')"
                                                class="inline-flex items-center gap-1 rounded-md
                                                       border border-red-200 px-3 py-1.5
                                                       text-sm text-red-600 transition
                                                       hover:bg-red-50"
                                            >

                                                <x-heroicon-o-trash class="h-4 w-4"/>

                                                Delete

                                            </button>


                                        </form>


                                    </div>


                                @else

                                    <span class="text-sm text-gray-400">
                                        Locked
                                    </span>

                                @endif


                            </td>


                        </tr>


                    @empty


                        <tr>

                            <td
                                colspan="7"
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


        <div class="mt-6">

            {{ $attendances->links() }}

        </div>


    </div>


@endsection