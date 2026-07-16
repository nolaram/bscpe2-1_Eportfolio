@extends('layouts.admin')

@section('title', 'Edit Student')

@section('page-title', 'Edit Student')

@section('content')

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

<div class="p-8">

        {{-- Page Heading --}}
        <div class="mb-8">

            <h1 class="text-3xl font-bold text-gray-900">
                Edit Student
            </h1>

            <p class="mt-2 text-sm text-gray-500">
                Update the student's information.
            </p>

        </div>

        {{-- Form Card --}}
        <div class="rounded-xl border border-gray-200 bg-white p-8 shadow-sm">

            <form action="{{ route('admin.students.update', $student) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="mb-8">

                    <h2 class="text-lg font-semibold text-gray-900">
                        Student Information
                    </h2>

                    <p class="mt-1 text-sm text-gray-500">
                        Modify the student's account details below.
                    </p>

                </div>

                {{-- Student Number --}}
                <div class="mb-6">

                    <label class="block text-sm font-medium text-gray-700">
                        Student Number
                    </label>

                    <input
                        type="text"
                        name="student_number"
                        value="{{ old('student_number', $student->student_number) }}"
                        class="mt-2 w-full rounded-lg border border-gray-300 px-4 py-2.5
                               focus:border-primary focus:ring-2 focus:ring-primary/20
                               outline-none transition"
                    >

                </div>

                {{-- Name --}}
                <div class="mb-6 grid grid-cols-1 gap-6 md:grid-cols-2">

                    <div>

                        <label class="block text-sm font-medium text-gray-700">
                            First Name
                        </label>

                        <input
                            type="text"
                            name="first_name"
                            value="{{ old('first_name', $student->first_name) }}"
                            class="mt-2 w-full rounded-lg border border-gray-300 px-4 py-2.5
                                   focus:border-primary focus:ring-2 focus:ring-primary/20
                                   outline-none transition"
                        >

                    </div>

                    <div>

                        <label class="block text-sm font-medium text-gray-700">
                            Last Name
                        </label>

                        <input
                            type="text"
                            name="last_name"
                            value="{{ old('last_name', $student->last_name) }}"
                            class="mt-2 w-full rounded-lg border border-gray-300 px-4 py-2.5
                                   focus:border-primary focus:ring-2 focus:ring-primary/20
                                   outline-none transition"
                        >

                    </div>

                </div>

                {{-- Email --}}
                <div class="mb-6">

                    <label class="block text-sm font-medium text-gray-700">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email', $student->user->email) }}"
                        class="mt-2 w-full rounded-lg border border-gray-300 px-4 py-2.5
                               focus:border-primary focus:ring-2 focus:ring-primary/20
                               outline-none transition"
                    >

                </div>

                {{-- Password --}}
                <div class="mb-8 grid grid-cols-1 gap-6 md:grid-cols-2">

                    <div>

                        <label class="block text-sm font-medium text-gray-700">
                            New Password
                        </label>

                        <input
                            type="password"
                            name="password"
                            class="mt-2 w-full rounded-lg border border-gray-300 px-4 py-2.5
                                   focus:border-primary focus:ring-2 focus:ring-primary/20
                                   outline-none transition"
                        >

                        <p class="mt-2 text-xs text-gray-500">
                            Leave blank to keep the current password.
                        </p>

                    </div>

                    <div>

                        <label class="block text-sm font-medium text-gray-700">
                            Confirm New Password
                        </label>

                        <input
                            type="password"
                            name="password_confirmation"
                            class="mt-2 w-full rounded-lg border border-gray-300 px-4 py-2.5
                                   focus:border-primary focus:ring-2 focus:ring-primary/20
                                   outline-none transition"
                        >

                    </div>

                </div>

                {{-- Buttons --}}
                <div class="flex justify-end gap-3">

                    <a
                        href="{{ route('admin.students.index') }}"
                        class="rounded-lg border border-gray-300 px-5 py-2.5
                               text-gray-700 transition hover:bg-gray-100"
                    >
                        Cancel
                    </a>

                    <button
                        type="submit"
                        class="rounded-lg bg-primary px-5 py-2.5
                               font-medium text-white transition hover:opacity-90"
                    >
                        Update Student
                    </button>

                </div>

            </form>

        </div>

    </div>

@endsection