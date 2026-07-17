@extends('layouts.dashboard')

@section('title', 'Edit Weekly Report')

@section('content')

@if ($errors->any())

    <div class="mb-6 rounded-lg border border-red-200 bg-red-50 p-4">

        <ul class="list-disc pl-5 text-red-600">

            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif

<div class="mb-6">

    <a
        href="{{ route('student.student.weekly-reports.index') }}"
        class="inline-flex items-center gap-2 text-primary hover:underline"
    >
        ← Back to Weekly Reports
    </a>

</div>

<div class="max-w-5xl mx-auto">

    <div class="rounded-2xl bg-white shadow-sm p-8">

        <h1 class="text-3xl font-bold">

            Edit Weekly Report

        </h1>

        <p class="mt-2 text-gray-500">

            Update your weekly report.

        </p>

        <form
            action="{{ route('student.student.weekly-reports.update', $weeklyReport) }}"
            method="POST"
            enctype="multipart/form-data"
            class="mt-8 space-y-6"
        >

            @csrf
            @method('PUT')

            <input
                type="hidden"
                name="status"
                value="{{ $weeklyReport->status }}"
            >

            <div class="grid md:grid-cols-3 gap-6">

                <div>

                    <label class="block mb-2">

                        Week Number

                    </label>

                    <input
                        type="number"
                        name="week_number"
                        class="w-full rounded-lg border px-4 py-2"
                        value="{{ old('week_number', $weeklyReport->week_number) }}"
                    >

                </div>

                <div>

                    <label class="block mb-2">

                        Week Start

                    </label>

                    <input
                        type="date"
                        name="week_start"
                        class="w-full rounded-lg border px-4 py-2"
                        value="{{ old('week_start', $weeklyReport->week_start?->format('Y-m-d')) }}"
                    >

                </div>

                <div>

                    <label class="block mb-2">

                        Week End

                    </label>

                    <input
                        type="date"
                        name="week_end"
                        class="w-full rounded-lg border px-4 py-2"
                        value="{{ old('week_end', $weeklyReport->week_end?->format('Y-m-d')) }}"
                    >

                </div>

            </div>

            <div>

                <label class="block mb-2">

                    Activities Performed

                </label>

                <textarea
                    name="activities"
                    rows="6"
                    class="w-full rounded-lg border px-4 py-3"
                >{{ old('activities', $weeklyReport->activities) }}</textarea>

            </div>

            <div>

                <label class="block mb-2">

                    Challenges Encountered

                </label>

                <textarea
                    name="challenges"
                    rows="4"
                    class="w-full rounded-lg border px-4 py-3"
                >{{ old('challenges', $weeklyReport->challenges) }}</textarea>

            </div>

            <div>

                <label class="block mb-2">

                    Skills Learned

                </label>

                <textarea
                    name="skills_learned"
                    rows="4"
                    class="w-full rounded-lg border px-4 py-3"
                >{{ old('skills_learned', $weeklyReport->skills_learned) }}</textarea>

            </div>

            <div class="grid md:grid-cols-2 gap-6">

                <div>

                    <label class="block mb-2">

                        Hours Rendered

                    </label>

                    <input
                        type="number"
                        step="0.5"
                        name="hours_rendered"
                        class="w-full rounded-lg border px-4 py-2"
                        value="{{ old('hours_rendered', $weeklyReport->hours_rendered) }}"
                    >

                </div>

                <div>

                    <label class="block mb-2">

                        Replace Attachment

                    </label>

                    <input
                        type="file"
                        name="report_file"
                        class="w-full"
                    >

                    @if($weeklyReport->report_file)

                        <p class="mt-2 text-sm text-gray-500">

                            Current file:

                            <a
                                href="{{ asset('storage/'.$weeklyReport->report_file) }}"
                                target="_blank"
                                class="text-primary underline"
                            >

                                View Attachment

                            </a>

                        </p>

                    @endif

                </div>

            </div>

            <div class="flex justify-end gap-4">

                <button
                    type="submit"
                    class="rounded-lg bg-primary px-5 py-3 text-white"
                >

                    Update Report

                </button>

            </div>

        </form>

    </div>

</div>

@endsection