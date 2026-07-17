@extends('layouts.dashboard')

@section('title', 'Weekly Reports')

@section('content')

<div class="space-y-6">

    @if(session('success'))

        <div
            class="rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-green-700"
        >

            {{ session('success') }}

        </div>

    @endif

    <div class="flex items-center justify-between">

        <div>

            <h1 class="text-3xl font-bold">

                Weekly Reports

            </h1>

            <p class="mt-2 text-gray-500">

                View all of your submitted weekly reports.

            </p>

        </div>

        <a
            href="{{ route('student.student.weekly-reports.create') }}"
            class="rounded-lg bg-primary px-5 py-3 text-white"
        >

            + New Weekly Report

        </a>

    </div>

    <div class="overflow-hidden rounded-xl bg-white shadow-sm">

        <table class="w-full">

            <thead class="bg-gray-50">

                <tr>

                    <th class="px-6 py-3 text-left">

                        Week

                    </th>

                    <th class="px-6 py-3 text-left">

                        Date Range

                    </th>

                    <th class="px-6 py-3 text-center">

                        Hours

                    </th>

                    <th class="px-6 py-3 text-center">

                        Status

                    </th>

                    <th class="px-6 py-3 text-center">

                        Action

                    </th>

                </tr>

            </thead>

            <tbody>

            @forelse($weeklyReports as $report)

                <tr class="border-t">

                    <td class="px-6 py-4">

                        Week {{ $report->week_number }}

                    </td>

                    <td class="px-6 py-4">

                        {{ $report->week_start->format('M d') }}
                        -
                        {{ $report->week_end->format('M d, Y') }}

                    </td>

                    <td class="px-6 py-4 text-center">

                        {{ $report->hours_rendered }}

                    </td>

                    <td class="px-6 py-4 text-center">

                        {{ $report->status }}

                    </td>

                    <td class="px-6 py-4 text-center">

                        <div class="flex justify-center gap-2">

                            <a
                                href="{{ route('student.student.weekly-reports.show', $report) }}"
                                class="rounded-md border px-3 py-2 text-sm hover:bg-gray-50"
                            >

                                View

                            </a>

                            @if($report->status === 'Draft')

                                <a
                                    href="{{ route('student.student.weekly-reports.edit', $report) }}"
                                    class="rounded-md bg-blue-600 px-3 py-2 text-sm text-white hover:bg-blue-700"
                                >

                                    Edit

                                </a>

                                <form
                                    action="{{ route('student.student.weekly-reports.destroy', $report) }}"
                                    method="POST"
                                    onsubmit="return confirm('Delete this draft?')"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        class="rounded-md bg-red-600 px-3 py-2 text-sm text-white hover:bg-red-700"
                                    >

                                        Delete

                                    </button>

                                </form>

                                <form
                                    action="{{ route('student.student.weekly-reports.submit', $report) }}"
                                    method="POST"
                                    onsubmit="return confirm('Submit this report? You will no longer be able to edit it.')"
                                >

                                    @csrf
                                    @method('PATCH')

                                    <button
                                        class="rounded-md bg-green-600 px-3 py-2 text-sm text-white hover:bg-green-700"
                                    >

                                        Submit

                                    </button>

                                </form>

                            @endif

                        </div>

                    </td>

                </tr>

            @empty

                <tr>

                    <td
                        colspan="5"
                        class="py-10 text-center text-gray-500"
                    >

                        No weekly reports yet.

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

    {{ $weeklyReports->links() }}

</div>

@endsection