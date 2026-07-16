@extends('layouts.admin')

@section('title', 'Assign Adviser')

@section('page-title', 'Assign Adviser')

@section('content')

    <div class="p-8">

        {{-- Page Heading --}}
        <div class="mb-8">

            <h1 class="text-3xl font-bold text-gray-900">
                Assign Adviser
            </h1>

            <p class="mt-2 text-sm text-gray-500">
                Assign an adviser to this student.
            </p>

        </div>


        {{-- Error Messages --}}
        @if ($errors->any())

            <div class="mb-6 rounded-lg border border-red-200 bg-red-50 p-4">

                <h3 class="font-semibold text-red-700">
                    Please fix the following errors:
                </h3>

                <ul class="mt-2 list-disc list-inside text-sm text-red-600">

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif


        {{-- Main Card --}}
        <div class="rounded-xl border border-gray-200 bg-white p-8 shadow-sm">


            {{-- Student Information --}}
            <div class="mb-8">

                <h2 class="text-lg font-semibold text-gray-900">
                    Student Information
                </h2>

                <div class="mt-4 rounded-lg bg-gray-50 p-4">

                    <p class="text-sm text-gray-600">
                        Student Name
                    </p>

                    <p class="font-medium text-gray-900">
                        {{ $student->first_name }}
                        {{ $student->last_name }}
                    </p>

                </div>

            </div>


            <form
                action="{{ route('admin.students.assign-adviser.update', $student) }}"
                method="POST"
            >

                @csrf
                @method('PUT')


                {{-- Adviser Selection --}}
                <div class="mb-8">

                    <label class="block text-sm font-medium text-gray-700">

                        Adviser

                    </label>


                    <select
                        name="adviser_id"
                        class="mt-2 w-full rounded-lg border border-gray-300
                               px-4 py-2.5
                               focus:border-primary focus:ring-2
                               focus:ring-primary/20
                               outline-none transition"
                    >

                        <option value="">
                            -- Select Adviser --
                        </option>


                        @foreach($advisers as $adviser)

                            <option
                                value="{{ $adviser->id }}"
                                @selected($student->adviser_id == $adviser->id)
                            >

                                {{ $adviser->last_name }},
                                {{ $adviser->first_name }}

                            </option>

                        @endforeach


                    </select>

                </div>



                {{-- Buttons --}}
                <div class="flex justify-end gap-3">


                    <a
                        href="{{ route('admin.students.index') }}"
                        class="rounded-lg border border-gray-300
                               px-5 py-2.5 text-gray-700
                               transition hover:bg-gray-100"
                    >

                        Cancel

                    </a>


                    <button
                        type="submit"
                        class="rounded-lg bg-primary px-5 py-2.5
                               font-medium text-white
                               transition hover:opacity-90"
                    >

                        Assign Adviser

                    </button>


                </div>


            </form>


        </div>


    </div>

@endsection