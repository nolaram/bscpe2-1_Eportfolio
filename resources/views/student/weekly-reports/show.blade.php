@extends('layouts.dashboard')

@section('title', 'Weekly Report')

@section('content')

<div
    x-data="{ openPreview: false }"
    class="space-y-6"
>

    <div class="mb-6">

        <a
            href="{{ route('student.student.weekly-reports.index') }}"
            class="inline-flex items-center gap-2 text-primary hover:underline"
        >
            ← Back to Weekly Reports
        </a>

    </div>

    <div class="max-w-5xl mx-auto space-y-6">

        <div class="rounded-2xl bg-white shadow-sm p-8">

            <div class="flex justify-between items-center">

                <div>

                    <h1 class="text-3xl font-bold">

                        Week {{ $weeklyReport->week_number }}

                    </h1>

                    <p class="text-gray-500 mt-2">

                        {{ $weeklyReport->week_start->format('M d, Y') }}
                        -
                        {{ $weeklyReport->week_end->format('M d, Y') }}

                    </p>

                </div>

                <span
                    class="rounded-full bg-primary/10 px-4 py-2 text-primary font-semibold"
                >

                    {{ $weeklyReport->status }}

                </span>

            </div>

        </div>

        <div class="rounded-xl bg-white shadow-sm p-8">

            <h2 class="text-xl font-semibold mb-4">

                Activities

            </h2>

            <p class="whitespace-pre-line">

                {{ $weeklyReport->activities }}

            </p>

        </div>

        <div class="rounded-xl bg-white shadow-sm p-8">

            <h2 class="text-xl font-semibold mb-4">

                Challenges

            </h2>

            <p class="whitespace-pre-line">

                {{ $weeklyReport->challenges ?: 'None' }}

            </p>

        </div>

        <div class="rounded-xl bg-white shadow-sm p-8">

            <h2 class="text-xl font-semibold mb-4">

                Skills Learned

            </h2>

            <p class="whitespace-pre-line">

                {{ $weeklyReport->skills_learned ?: 'None' }}

            </p>

        </div>

        <div class="rounded-xl bg-white shadow-sm p-8">

            <div class="grid md:grid-cols-2 gap-6">

                <div>

                    <h3 class="font-semibold">

                        Hours Rendered

                    </h3>

                    {{ $weeklyReport->hours_rendered }}

                </div>

                <div>

                    <h3 class="font-semibold mb-3">

                        Attachment

                    </h3>

                    @if($weeklyReport->report_file)

                        <button
                            type="button"
                            @click="openPreview = true"
                            class="rounded-lg bg-primary px-4 py-2 text-white hover:opacity-90"
                        >

                            View Attachment

                        </button>

                    @else

                        No attachment uploaded.

                    @endif

                </div>

            </div>

        </div>

        @if($weeklyReport->adviser_comment)

            <div class="rounded-xl border-l-4 border-primary bg-white shadow-sm p-8">

                <h2 class="font-semibold">

                    Adviser Comment

                </h2>

                <p class="mt-3">

                    {{ $weeklyReport->adviser_comment }}

                </p>

            </div>

        @endif

    </div>

    {{-- PDF Preview Modal --}}
    @if($weeklyReport->report_file)

        <div
            x-show="openPreview"
            x-transition
            x-cloak
            class="fixed inset-0 z-50 flex items-center justify-center"
        >

            {{-- Blurred Background --}}
            <div
                class="absolute inset-0 bg-black/50 backdrop-blur-sm"
                @click="openPreview = false"
            ></div>

            {{-- Modal --}}
            <div
                class="relative z-10 w-11/12 max-w-6xl rounded-2xl bg-white shadow-2xl"
            >

                <div
                    class="flex items-center justify-between border-b px-6 py-4"
                >

                    <h2 class="text-xl font-semibold">

                        Weekly Report Attachment

                    </h2>

                    <button
                        @click="openPreview = false"
                        class="text-2xl text-gray-500 hover:text-gray-700"
                    >

                        &times;

                    </button>

                </div>

                <iframe
                    src="{{ asset('storage/'.$weeklyReport->report_file) }}"
                    class="h-[75vh] w-full"
                ></iframe>

                <div
                    class="flex justify-end gap-3 border-t px-6 py-4"
                >

                    <a
                        href="{{ asset('storage/'.$weeklyReport->report_file) }}"
                        download
                        class="rounded-lg border px-5 py-2 hover:bg-gray-100"
                    >

                        Download

                    </a>

                    <button
                        @click="openPreview = false"
                        class="rounded-lg bg-primary px-5 py-2 text-white hover:opacity-90"
                    >

                        Close

                    </button>

                </div>

            </div>

        </div>

    @endif

</div>

@endsection