@extends('layouts.dashboard')

@section('title', 'Create Weekly Report')

@section('content')

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

            Create Weekly Report

        </h1>

        <p class="mt-2 text-gray-500">

            Submit your accomplishments for this week.

        </p>

        <form
            action="{{ route('student.student.weekly-reports.store') }}"
            method="POST"
            enctype="multipart/form-data"
            class="mt-8 space-y-6"
        >

            @csrf

            <div class="grid md:grid-cols-3 gap-6">

                <div>

                    <label class="block mb-2">

                        Week Number

                    </label>

                    <input
                        type="number"
                        name="week_number"
                        class="w-full rounded-lg border px-4 py-2"
                        value="{{ old('week_number') }}"
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
                        value="{{ old('week_start') }}"
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
                        value="{{ old('week_end') }}"
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
                >{{ old('activities') }}</textarea>

            </div>

            <div>

                <label class="block mb-2">

                    Challenges Encountered

                </label>

                <textarea
                    name="challenges"
                    rows="4"
                    class="w-full rounded-lg border px-4 py-3"
                >{{ old('challenges') }}</textarea>

            </div>

            <div>

                <label class="block mb-2">

                    Skills Learned

                </label>

                <textarea
                    name="skills_learned"
                    rows="4"
                    class="w-full rounded-lg border px-4 py-3"
                >{{ old('skills_learned') }}</textarea>

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
                        value="{{ old('hours_rendered') }}"
                    >

                </div>

                <div>

                    <label class="block mb-2">

                        Attachment

                    </label>

                    <input
                        type="file"
                        name="report_file"
                        class="w-full"
                    >

                </div>

            </div>

            <div class="flex justify-end">

                <input
                    type="hidden"
                    name="status"
                    value="Draft"
                >

                <button
                    type="submit"
                    class="rounded-lg bg-primary px-5 py-3 text-white transition hover:opacity-90"
                >

                    Save Draft

                </button>

            </div>

        </form>

    </div>

</div>

@endsection