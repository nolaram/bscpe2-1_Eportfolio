@extends('layouts.admin')

@section('title', 'Student Management')

@section('content')

<div class="p-6">

        {{-- Toolbar --}}
        <div class="mb-6 flex flex-col gap-4 md:flex-row md:items-center md:justify-between">

            <input
                type="text"
                placeholder="Search students..."
                class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm
                       focus:border-primary focus:ring-2 focus:ring-primary/20
                       outline-none transition md:max-w-sm"
            >

            <a
                href="{{ route('admin.students.create') }}"
                class="inline-flex items-center justify-center gap-2 rounded-lg
                       bg-primary px-5 py-2.5 text-sm font-medium text-white
                       shadow-sm transition hover:shadow-md hover:opacity-95"
            >

                <x-heroicon-o-plus class="h-5 w-5"/>

                Add Student

            </a>

        </div>

        {{-- Student Table --}}
        <div class="overflow-x-auto rounded-xl border border-gray-200 bg-white shadow-sm">

            <table class="w-full">

                <thead class="bg-gray-50">

                    <tr>

                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                            Student No.
                        </th>

                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                            Name
                        </th>

                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                            Email
                        </th>

                        <th class="px-6 py-3 text-center text-xs font-semibold uppercase tracking-wider text-gray-500">
                            Actions
                        </th>

                    </tr>

                </thead>

                <tbody class="divide-y divide-gray-100">

                    @forelse($students as $student)

                        <tr class="transition hover:bg-gray-50">

                            <td class="px-6 py-4 text-sm text-gray-700">
                                {{ $student->student_number }}
                            </td>

                            <td class="px-6 py-4 font-medium text-gray-900">
                                {{ $student->first_name }}
                                {{ $student->last_name }}
                            </td>

                            <td class="px-6 py-4 text-sm text-gray-600">
                                {{ $student->user->email }}
                            </td>

                            <td class="px-6 py-4">

                                <div class="flex justify-center gap-2">

                                    <a
                                        href="{{ route('admin.students.edit', $student) }}"
                                        class="inline-flex items-center gap-1 rounded-md
                                               border border-gray-300 px-3 py-1.5
                                               text-sm text-gray-700 transition
                                               hover:bg-gray-100"
                                    >

                                        <x-heroicon-o-pencil-square class="h-4 w-4"/>

                                        Edit

                                    </a>

                                    <form
                                        action="{{ route('admin.students.destroy', $student) }}"
                                        method="POST"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            onclick="return confirm('Delete this student?')"
                                            class="inline-flex items-center gap-1 rounded-md
                                                   border border-red-200 px-3 py-1.5
                                                   text-sm text-red-600 transition
                                                   hover:bg-red-50"
                                        >

                                            <x-heroicon-o-trash class="h-4 w-4"/>

                                            Delete

                                        </button>

                                    </form>

                                    <a
                                        href="{{ route('admin.students.assign-adviser', $student) }}"
                                        class="inline-flex items-center gap-1 rounded-md
                                               border border-gray-300 px-3 py-1.5
                                               text-sm text-gray-700 transition
                                               hover:bg-gray-100"
                                    >

                                        <x-heroicon-o-academic-cap class="h-4 w-4"/>

                                        Assign

                                    </a>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="4"
                                class="px-6 py-12 text-center text-gray-500"
                            >

                                No students found.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

@endsection